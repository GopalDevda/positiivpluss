<?php 

namespace App\Models;

use CodeIgniter\Model;

class CompanyVehicleDetailModel extends Model{

	protected $table      = 'company_vehicle_detail';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['vehicle','year', 'type', 'model', 'derivative','status','user_id','efficiency','emission_factor'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;

}



