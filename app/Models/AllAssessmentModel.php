<?php 



namespace App\Models;



use CodeIgniter\Model;



class AllAssessmentModel extends Model{



	protected $table      = 'all_assessment_question';



    protected $primaryKey = 'id';







    protected $useAutoIncrement = true;







    protected $returnType     = 'array';



    protected $useSoftDeletes = true;







    protected $allowedFields = ['all_assessment_id','is_mandatory_needed','industry_id','answer','indicator_id','indicator_category_id','question','choice','user_id','status','remark','is_document_needed','location','company','question_title','disclosure_id','standard','sub_clasification','clasification'];







    protected $useTimestamps = false;



    protected $createdField  = 'created_at';



    protected $updatedField  = 'updated_at';



    protected $deletedField  = 'deleted_at';







    //protected $validationRules    = [];



    //protected $validationMessages = [];



    protected $skipValidation     = false;



}



