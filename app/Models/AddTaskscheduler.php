<?php 
namespace App\Models;
use CodeIgniter\Model;
class AddTaskscheduler extends Model{
	protected $table      = 'task_scheduler';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array'; 
    protected $useSoftDeletes = false;
protected $allowedFields = 
['supplier_id','owner_id','boundary_id','subboundary_id','type','assessment_id','assign','frequency','comment','due_date','priority','status'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}