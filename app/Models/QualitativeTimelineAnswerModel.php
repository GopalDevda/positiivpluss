<?php 
namespace App\Models;
use CodeIgniter\Model;
class QualitativeTimelineAnswerModel extends Model{
	protected $table      = 'qualitative_timeline_answer';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array'; 
    protected $useSoftDeletes = false;
    protected $allowedFields = ['status','answer_id','assigned_to','start_date','due_date','control_assessment_id','percentile','complete_status','passfail_status'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
//    protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}