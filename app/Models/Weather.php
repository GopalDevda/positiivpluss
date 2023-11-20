<?php 
namespace App\Models;
use CodeIgniter\Model;
class Weather extends Model{
	protected $table      = 'Weather';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array'; 
    protected $useSoftDeletes = false;
protected $allowedFields = 
['city_name','description','temp','temp_min','temp_max','humidity','wind','sunrise','windDir80m','timestampRoh','windDir','sunset','site_id','status','supplier_id','owner_id','wind_gust','boundary_id','long','lat','timestamp_date'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}