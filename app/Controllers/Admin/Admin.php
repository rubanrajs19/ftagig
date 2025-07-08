<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OnboardingModel;

class Admin extends BaseController
{
    public function onboarding()
    {
        $model = new OnboardingModel();
        $data['submissions'] = $model->orderBy('id', 'DESC')->findAll();

        return view('admin/onboarding_list', $data);
    }
}
