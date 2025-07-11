<?php
namespace App\Models;
use CodeIgniter\Model;
class ServiceCategoryModel extends Model {
    protected $table = 'service_categories';
    protected $allowedFields = ['name', 'description', 'slug', 'type', 'is_active'];
}
