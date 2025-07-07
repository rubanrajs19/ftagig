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
            $form['features'] = $form['features'] ?? '';
            $form['is_active'] = $form['is_active'] ?? 0;
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

        if ($this->request->getMethod() === 'POST') {
            $form = $this->request->getPost();
            $form['features'] = $form['features'] ?? '';
            $form['is_active'] = $form['is_active'] ?? 0;
            $model->update($id, $form);
            return redirect()->to('/admin/services');
        }

        return view('admin/services/edit', [
            'service' => $model->find($id),
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
}