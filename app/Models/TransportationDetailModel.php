<?php 

namespace App\Models;

use CodeIgniter\Model;

class TransportationDetailModel extends Model{

    protected $table      = 'transportation_detail';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['vehicle_id','year', 'type', 'model', 'status','user_id','ghg_factor_id','from_distance','to_distance','footprint_id'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;

}



