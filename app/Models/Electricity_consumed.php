<?php 
namespace App\Models;
use CodeIgniter\Model;
class Electricity_consumed extends Model{
	protected $table      = 'electricity_consumed';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array'; 
    protected $useSoftDeletes = false;
protected $allowedFields = 
['supplier_id','owner_id','disclosure_id','sub_disclosure_id','sub_class_id','start_date','end_date','boundry','site','value','unit','comment','status','sub_e_type'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}