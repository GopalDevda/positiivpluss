<?php 
namespace App\Models;
use CodeIgniter\Model;
class ActionCenterModel extends Model{
	protected $table      = 'action_center';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array'; 
    protected $useSoftDeletes = false;
protected $allowedFields = 
['supplier_id','owner_id','assignee','uniq_spl','step','title','due_date','tag','description','priority','audit','question_id','indicator_id','assessment_id','assign_from','status'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}