<?php 

namespace App\Models;

use CodeIgniter\Model;

class RawMaterialProcessDetailModel extends Model{

    protected $table      = 'raw_material_process_detail';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['process_name','sub_industry_name','remark','user_id', 'status','industry_id','unit_id'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;

}
