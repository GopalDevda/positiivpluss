<?php 
namespace App\Models;  
use CodeIgniter\Model;
  
class ApiUserModel extends Model{
    protected $table = 'apiusers';
    
    protected $allowedFields = [
        'name',
        'email',
        'mobile',
        'brand_name',
        'country_id',
        'industry_id',
        'password',
        'test_key',
        'live_key',
        'created_at'
    ];
}