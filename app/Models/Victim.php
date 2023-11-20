<?php 
namespace App\Models;
use CodeIgniter\Model;
class Victim extends Model{
	protected $table      = 'victim';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array'; 
    protected $useSoftDeletes = false;
protected $allowedFields = 
['id','victim_type','victim_name','gender','age','details_injury','victim_work','details_treatment','status',
'tool_issue_id','supplier_id','owner_id','body_mark','step_id',];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}