<?php
namespace App\Models;
use CodeIgniter\Model;
class ServiceModel extends Model {
    protected $table = 'services';
    protected $primaryKey = 'id'; // ✅ Add this
    
    protected $allowedFields = [
        'category_id','title','description','delivery_time','price','rating','rating_count','ideal_for','features','button_1_label','button_2_label','is_active', 'slug' 
    ];
}