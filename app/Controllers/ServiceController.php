<?php 
namespace App\Controllers;

use App\Models\ServiceModel;
use App\Models\ServiceCategoryModel;


class ServiceController extends BaseController
{
    public function detail($type, $categorySlug, $serviceSlug)
    {
        $serviceModel = new ServiceModel();
        $categoryModel = new ServiceCategoryModel();

        // Fetch service by slug
        $service = $serviceModel->where('slug', $serviceSlug)->first();

        if (!$service) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        // Fetch category name
        $category = $categoryModel->where('slug', $categorySlug)->first();
        $categoryName = $category['name'] ?? ucfirst($categorySlug);

        // Decode related categories (if available)
        $relatedServices = [];

        if (!empty($service['related_categories'])) {
            $relatedIds = json_decode($service['related_categories'], true);

            if (!empty($relatedIds)) {
                $db = \Config\Database::connect();

                $builder = $db->table('services s');
                $builder->select('s.*, c.slug AS category_slug, c.type AS category_type, c.name AS category_name');
                $builder->join('service_categories c', 'c.id = s.category_id', 'left');
                $builder->where('s.is_active', 1);
                $builder->where('s.id !=', $service['id']);

                if (!empty($service['related_categories'])) {
                    $relatedIds = json_decode($service['related_categories'], true);
                    if (!empty($relatedIds)) {
                        $builder->whereIn('s.category_id', $relatedIds);
                    }
                } else {
                    $builder->where('s.category_id', $service['category_id']);
                }

                $relatedServices = $builder->get()->getResultArray();

            }
        } 
        

        return view('service_detail', [
            'service' => $service,
            'category_slug' => $categorySlug,
            'category_name' => $categoryName,
            'related_services' => $relatedServices,
            'category_type' => $category['type']
        ]);
    }
}
