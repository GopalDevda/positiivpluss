<?php 
namespace App\Models;
use CodeIgniter\Model;
class Template extends Model{
	protected $table      = 'template_addition';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array'; 
    protected $useSoftDeletes = false;
protected $allowedFields = 
['supplier_id','owner_id','name','type','industry','indicator','company_size','icon','description','approve_status','assessment_id','status','indicator_category','location','weight'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}