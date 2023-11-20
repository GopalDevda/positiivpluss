<?php 
namespace App\Models;
use CodeIgniter\Model;
class MasterSubDis extends Model{
	protected $table      = 'master_addtion_subdisclosure';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array'; 
    protected $useSoftDeletes = false;
protected $allowedFields = 
['title','sub_disclosure_id','boundary_id','answer_option','type_option','date_option','sub_classifiction_1','opreator','sub_classifiction_2','status','sub_clasifiction','action','boundary_select','total_value','disclosure_id'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}