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
        $data['services'] = $model->findAll();
       
        return view('admin/services/index', $data);
    }

    public function create()
    {
        $categoryModel = new ServiceCategoryModel();

        if ($this->request->getMethod() === 'POST') {
            $model = new ServiceModel();
            $form = $this->request->getPost();

            // Convert features from editor if passed as HTML, but expected JSON
            if (empty($form['features'])) {
                $form['features'] = ''; // optional fallback
            }

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
            if (empty($form['features'])) {
                $form['features'] = ''; // optional fallback
            }
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
}