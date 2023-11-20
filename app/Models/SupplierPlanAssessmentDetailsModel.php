<?php 



namespace App\Models;



use CodeIgniter\Model;



class SupplierPlanAssessmentDetailsModel extends Model{



	protected $table      = 'supplier_plan_assessment_details';



    protected $primaryKey = 'id';



    protected $useAutoIncrement = true;



    protected $returnType     = 'array';



    protected $useSoftDeletes = false;







    protected $allowedFields = ['supplier_plan_id', 'assessment_id','no_of_entry','status','user_id'];







    protected $useTimestamps = true;



    protected $createdField  = 'created_at';



    protected $updatedField  = 'updated_at';



    //protected $deletedField  = 'deleted_at';







    //protected $validationRules    = [];



    //protected $validationMessages = [];



    protected $skipValidation     = false;



}

