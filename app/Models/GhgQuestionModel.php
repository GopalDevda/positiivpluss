<?php 
namespace App\Models;
use CodeIgniter\Model;
class GhgQuestionModel extends Model{
	protected $table      = 'ghg_question';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['industry_id','indicator_id','footprint_id','ghg_id','ghg_factor_id','question','remark', 'user_id','status'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}

