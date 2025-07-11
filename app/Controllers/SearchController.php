<?php
namespace App\Controllers;

use App\Models\ServiceModel;
use CodeIgniter\Controller;
use Config\Database;


class SearchController extends BaseController
{
    public function searchServices()
    {
        $query = $this->request->getGet('query');

        $db = Database::connect();
        $builder = $db->table('service_categories');
        $builder->distinct();
        $builder->select('service_categories.name, service_categories.slug, service_categories.description, service_categories.type');
        $builder->join('services', 'services.category_id = service_categories.id', 'left');

        $builder->groupStart()
            ->like('service_categories.name', $query)
            ->orLike('service_categories.description', $query)
            ->orLike('services.title', $query)
        ->groupEnd();

        $builder->where('service_categories.is_active', 1);
        $builder->limit(10);

        $results = $builder->get()->getResultArray();

        // 🔧 Append full slug based on type
        $formatted = array_map(function ($item) {
            $prefix = ($item['type'] === 'individual') ? 'individual-service' : 'bundled-service';
            return [
                'name' => $item['name'],
                'slug' => "{$prefix}/{$item['slug']}",
                'description' => $item['description']
            ];
        }, $results);

        return $this->response->setJSON($formatted);
    }
}



// Working Example below 

/*class SearchController extends BaseController
{
    public function searchServices()
    {
        $query = $this->request->getGet('query');

        $db = Database::connect();
        $builder = $db->table('services');
        $builder->select('services.title, services.slug');
        $builder->join('service_categories', 'services.category_id = service_categories.id', 'left');
        $builder->groupStart()
            ->like('services.title', $query)
            ->orLike('services.description', $query)
            ->orLike('service_categories.name', $query)
        ->groupEnd();
        $builder->where('services.is_active', 1);
        $builder->limit(10);
        $results = $builder->get()->getResultArray();

        $formatted = array_map(function ($item) {
            return [
                'title' => $item['title'],
                'slug' => $item['slug'],
            ];
        }, $results);

        return $this->response->setJSON($formatted);
    }
}
*/
