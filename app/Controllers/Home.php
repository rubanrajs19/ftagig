<?php

namespace App\Controllers;
use App\Models\ServiceModel;
use App\Models\ServiceCategoryModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message');
    }
    public function ftagig() {
        // $gigModel = new \App\Models\GigServiceModel();
        // $data['gigs'] = $gigModel->findAll();
        
        //return view('ftagig');
        $categoryModel = new ServiceCategoryModel();
        $serviceModel  = new ServiceModel();

        $individual_categories = $categoryModel->where('type', 'individual')->findAll();
        $bundle_categories     = $categoryModel->where('type', 'bundle')->findAll();

        $individual_services = [];
        foreach ($individual_categories as $cat) {
            $individual_services[$cat['id']] = $serviceModel
                ->where('category_id', $cat['id'])
                 ->where('is_active', 1)
                ->findAll();
        }

        $bundle_services = [];
        foreach ($bundle_categories as $cat) {
            $bundle_services[$cat['id']] = $serviceModel
                ->where('category_id', $cat['id'])
                ->where('is_active', 1)
                ->findAll();
        }

        return view('ftagig', [
            'individual_categories' => $individual_categories,
            'bundle_categories'     => $bundle_categories,
            'individual_services'   => $individual_services,
            'bundle_services'       => $bundle_services,
        ]);
        
    }

    public function individualService($slug)
    {
        $categoryModel = new \App\Models\ServiceCategoryModel();
        $serviceModel  = new \App\Models\ServiceModel();

        $category = $categoryModel->where('slug', $slug)->first();

        if (!$category) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $services = $serviceModel
            ->where('category_id', $category['id'])
            ->where('is_active', 1)
            ->findAll();

        $allCategories = $categoryModel->findAll();
     
        return view('service_category_page', [
            'category'   => $category,
            'services'   => $services,
            'all_categories' => $allCategories ,
            'breadcrumb' => [
                'Home' => base_url('/'),
                // 'Individual Services' => base_url('/individual-service'),
                $category['name'] => null
            ]
        ]);
    }

    public function bundleService($slug)
    {
        
        $categoryModel = new \App\Models\ServiceCategoryModel();
        $serviceModel  = new \App\Models\ServiceModel();

        $category = $categoryModel->where('slug', $slug)->first();

        if (!$category || $category['type'] !== 'bundle') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $services = $serviceModel
            ->where('category_id', $category['id'])
            ->where('is_active', 1)
            ->findAll();

        $breadcrumb = [
            'Home' => base_url('/'),
            // 'Bundled Services' => base_url('/bundle-service'),
            $category['name'] => null
        ];
        $allCategories = $categoryModel->findAll();

        return view('service_category_page', [
            'category'   => $category,
            'services'   => $services,
             'all_categories' => $allCategories ,
            'breadcrumb' => $breadcrumb
        ]);
    }


}
