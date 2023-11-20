<?php 

namespace App\Models;

use CodeIgniter\Model;

class AllAdvanceAssessmentModel extends Model{

	protected $table      = 'all_advance_assessment_question';

    protected $primaryKey = 'id';



    protected $useAutoIncrement = true;



    protected $returnType     = 'array';

    protected $useSoftDeletes = true;



    protected $allowedFields = ['all_assessment_id','is_mandatory_needed','industry_id','answer','question','choice','user_id','status','remark','is_document_needed','location','company','question_title'];



    protected $useTimestamps = false;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

    protected $deletedField  = 'deleted_at';



    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;

}

