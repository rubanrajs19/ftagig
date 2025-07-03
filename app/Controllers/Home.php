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
                ->findAll();
        }

        $bundle_services = [];
        foreach ($bundle_categories as $cat) {
            $bundle_services[$cat['id']] = $serviceModel
                ->where('category_id', $cat['id'])
                ->findAll();
        }

        return view('ftagig', [
            'individual_categories' => $individual_categories,
            'bundle_categories'     => $bundle_categories,
            'individual_services'   => $individual_services,
            'bundle_services'       => $bundle_services,
        ]);
        
    }
}
