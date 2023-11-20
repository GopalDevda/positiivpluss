<?php 

namespace App\Models;

use CodeIgniter\Model;

class VehicleModel extends Model{

	protected $table      = 'vehicle';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['vehicle_name','industry_id','sub_industry_id','status','user_id','footprint_id'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;

}



