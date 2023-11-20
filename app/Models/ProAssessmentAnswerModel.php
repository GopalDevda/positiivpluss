<?php 

namespace App\Models;

use CodeIgniter\Model;

class ProAssessmentAnswerModel extends Model{

	protected $table      = 'pro_assessment_answer';

    protected $primaryKey = 'id';



    protected $useAutoIncrement = true;



    protected $returnType     = 'array';

    protected $useSoftDeletes = true;



    protected $allowedFields = ['base_assessment_question_id', 'answer','marks','degree_id','user_id','status','badge_id'];



    protected $useTimestamps = false;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

    protected $deletedField  = 'deleted_at';



    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;

}

