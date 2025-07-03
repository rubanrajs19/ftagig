<?php
namespace App\Controllers\Admin;
use App\Models\ServiceCategoryModel;
class Categories extends \CodeIgniter\Controller {
    public function index() {
        $model = new ServiceCategoryModel();
        return view('admin/categories/index', [
            'categories' => $model->findAll()
        ]);
    }

    public function create() {
       
        if ($this->request->getMethod() === 'POST') {
            $form = $this->request->getPost();
            if (empty($form['slug']) && !empty($form['name'])) {
                $form['slug'] = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $form['name'])));
            }
            $model = new ServiceCategoryModel();
            $model->insert($this->request->getPost());
            return redirect()->to('/admin/categories');
        }
        return view('admin/categories/create');
    }

    public function edit($id) {
        $model = new ServiceCategoryModel();
        if ($this->request->getMethod() === 'POST') {
            $model->update($id, $this->request->getPost());
            return redirect()->to('/admin/categories');
        }
        return view('admin/categories/edit', [
            'category' => $model->find($id)
        ]);
    }

    public function delete($id) {
        $model = new ServiceCategoryModel();
        $model->delete($id);
        return redirect()->to('/admin/categories');
    }
}
