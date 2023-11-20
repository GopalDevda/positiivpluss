<?php 

namespace App\Models;

use CodeIgniter\Model;

class SdgAssessmentModel extends Model{

	protected $table      = 'sdg_assessment_question';

    protected $primaryKey = 'id';



    protected $useAutoIncrement = true;



    protected $returnType     = 'array';

    protected $useSoftDeletes = true;



    protected $allowedFields = ['industry_id', 'indicator_id','sdg_id','question','choice','user_id','status','remark','is_document_needed','company_id','country_id','question_title','disclosure_id'];



    protected $useTimestamps = false;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

    protected $deletedField  = 'deleted_at';



    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;

}

