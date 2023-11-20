<?php 
namespace App\Models;
use CodeIgniter\Model;
class Qualitative_assessment_step extends Model{
	protected $table      = 'Qualitative_assessment_step';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array'; 
    protected $useSoftDeletes = false;
protected $allowedFields = 
['supplier_id','owner_id','control_assessment_id','indicator_id','question_id','select_question_id','status'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}