<?php 
namespace App\Models;
use CodeIgniter\Model;
class Assessment extends Model
{	
  protected $table      = 'assessment';  
  protected $primaryKey = 'id';   
  protected $useAutoIncrement = true;  
  protected $returnType     = 'array';  
  // protected $useSoftDeletes = true;  
  protected $allowedFields =
   ['assessment_name', 'title','weight_percentage','description','image','boundary', 'indicator_id', 'assessmemnt_access','indicator_category_id','company_size','location_id','industry_id','addquestion','viewassessment','user_id','status']; 
      protected $useTimestamps = false;  
        protected $createdField  = 'created_at';   
         protected $updatedField  = 'updated_at';    
   protected $deletedField  = 'deleted_at';  
     //protected $validationRules    = [];    
     //protected $validationMessages = [];   
      protected $skipValidation     = false;
  }