<?php

namespace App\Models;
use CodeIgniter\Model;

class OnboardingModel extends Model
{
    protected $table = 'onboarding_submissions';
    protected $allowedFields = [
        'first_name', 'last_name', 'business_territory', 'marketing_team_size',
        'email', 'monthly_traffic', 'phone', 'challenges', 'agree',
        'tracked_url_hidden', 'implementation_choice', 'page_url'
    ];
}
