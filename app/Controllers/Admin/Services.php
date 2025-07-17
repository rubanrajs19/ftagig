<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ServiceModel;
use App\Models\ServiceCategoryModel;

class Services extends BaseController
{
      public function index()
    {
        $model = new ServiceModel();
        $categoryModel = new ServiceCategoryModel();

        $services = $model->findAll();
        $categories = $categoryModel->findAll();
        $catMap = array_column($categories, 'name', 'id');

        return view('admin/services/index', [
            'services' => $services,
            'categories' => $catMap
        ]);
    }

    public function create()
    {
        $categoryModel = new ServiceCategoryModel();

        if ($this->request->getMethod() === 'POST') {
            $model = new ServiceModel();
            $form = $this->request->getPost();

            // Default values for checkbox + textarea
            $form['features'] = $form['features'] ?? '';
            $form['is_active'] = $form['is_active'] ?? 0;

            // Handle optional slug
            $form['slug'] = !empty($form['slug']) ? $form['slug'] : null;

            // Handle optional about
            $form['about'] = !empty($form['about']) ? $form['about'] : null;
            $form['related_categories'] = isset($form['related_categories']) ? json_encode($form['related_categories']) 
                : null;


            // Handle optional image upload
            $imageNames = [];
            $images = $this->request->getFiles()['images'] ?? [];

            if ($images) {
                foreach ($images as $image) {
                    if ($image->isValid() && !$image->hasMoved()) {
                        $newName = uniqid() . '_' . $image->getClientName();
                        $image->move(ROOTPATH . 'public/assets/banners/', $newName);
                        $imageNames[] = $newName;
                    }
                }
            }

            // Save image filenames as JSON
            $form['images'] = !empty($imageNames) ? json_encode($imageNames) : null;

            $model->insert($form);

            return redirect()->to('/admin/services');
        }

        return view('admin/services/create', [
            'categories' => $categoryModel->findAll()
        ]);
    }


    public function edit($id)
    {
        $model = new ServiceModel();
        $categoryModel = new ServiceCategoryModel();
        $service = $model->find($id);

        if (!$service) {
            return redirect()->to('/admin/services')->with('error', 'Service not found.');
        }

        if ($this->request->getMethod() === 'POST') {
            $form = $this->request->getPost();

            $form['features'] = $form['features'] ?? '';
            $form['is_active'] = $form['is_active'] ?? 0;
            $form['slug'] = !empty($form['slug']) ? $form['slug'] : null;
            $form['about'] = !empty($form['about']) ? $form['about'] : null;

            // ✅ Slug uniqueness check (ignore current row)
            if ($form['slug']) {
                $exists = $model->where('slug', $form['slug'])->where('id !=', $id)->first();
                if ($exists) {
                    return redirect()->back()->withInput()->with('error', 'Slug already exists. Try a different one.');
                }
            }

            // 🖼️ Handle image deletion + merging
            $existingImages = $this->request->getPost('existing_images') ?? [];
            $deleteImages = $this->request->getPost('delete_images') ?? [];

            // Delete selected files from disk
            foreach ($deleteImages as $img) {
                $path = ROOTPATH . 'public/assets/banners/' . $img;
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            // Upload new images
            $newImages = [];
            $images = $this->request->getFiles()['images'] ?? [];

            if ($images) {
                foreach ($images as $image) {
                    if ($image->isValid() && !$image->hasMoved()) {
                        $newName = uniqid() . '_' . $image->getClientName();
                        $image->move(ROOTPATH . 'public/assets', $newName);
                        $newImages[] = $newName;
                    }
                }
            }

            // Final image list: existing (not deleted) + new
            $finalImageList = array_merge($existingImages, $newImages);
            $form['images'] = !empty($finalImageList) ? json_encode($finalImageList) : null;
            $form['related_categories'] = isset($form['related_categories']) ? json_encode($form['related_categories']): null;
            $model->update($id, $form);

            return redirect()->to('/admin/services')->with('success', 'Service updated successfully.');
        }

        return view('admin/services/edit', [
            'service' => $service,
            'categories' => $categoryModel->findAll()
        ]);
    }


    public function delete($id)
    {
        $model = new ServiceModel();
        $model->delete($id);
        return redirect()->to('/admin/services');
    }

    public function toggle($id)
    {
        $model = new ServiceModel();
        $service = $model->find($id);
        $model->update($id, ['is_active' => !$service['is_active']]);
        return redirect()->to('/admin/services');
    }

    public function clone($id)
    {
        $model = new ServiceModel();
        $original = $model->find($id);
        unset($original['id']);
        $original['title'] .= ' (Copy)';
        $model->insert($original);
        return redirect()->to('/admin/services');
    }
   public function checkSlug()
    {
        $slug = $this->request->getGet('slug');
        $id = $this->request->getGet('id'); // passed during edit for exclusion

        $serviceModel = new \App\Models\ServiceModel();

        $query = $serviceModel->where('slug', $slug);

        if (!empty($id)) {
            $query->where('id !=', $id);
        }

        $exists = $query->first();

        return $this->response->setJSON(['available' => !$exists]);
    }

}