<?php 

namespace App\Models;

use CodeIgniter\Model;

class AllMasterAssessmentAnswerModel extends Model{

	protected $table      = 'all_master_assessment_answer';

    protected $primaryKey = 'id';



    protected $useAutoIncrement = true;



    protected $returnType     = 'array';

    protected $useSoftDeletes = true;



    protected $allowedFields = ['choice','answer','marks','answeroption','degree_id','user_id','status','badge_id'];



    protected $useTimestamps = false;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

    protected $deletedField  = 'deleted_at';



    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;

}

