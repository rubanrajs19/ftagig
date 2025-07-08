<?php

namespace App\Controllers;
use App\Models\OnboardingModel;

class Onboarding extends BaseController
{
    public function submit()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'tracked_url_hidden' => 'required',
            'implementation_choice' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'business_territory' => 'required',
            'marketing_team_size' => 'required',
            'email' => 'required|valid_email',
            'monthly_traffic' => 'required',
            'phone' => 'required',
            'challenges' => 'required',
            'agree' => 'required',
            'page_url' => 'required'
        ];

        if (!$this->validate($rules)) {
            return $this->response->setJSON([
                'success' => false,
                'errors' => $validation->getErrors()
            ]);
        }

        $model = new OnboardingModel();
        $model->save($this->request->getPost());

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Form submitted successfully!'
        ]);
    }
}
