<?php 
namespace App\Models;
use CodeIgniter\Model;
class SubClassificationModel extends Model{	

protected $table   = 'sub_classification'; 
protected $primaryKey = 'id';   
protected $useAutoIncrement = true;    
protected $returnType  = 'array';    
protected $useSoftDeletes = true;    
protected $allowedFields = 
['classification_name','standard_id', 'sub_classification_name', 'user_id','status','unit_id','guidelines'];    
protected $useTimestamps = true;
protected $createdField  = 'created_at';   
protected $updatedField  = 'updated_at';    
protected $deletedField  = 'deleted_at';    
 //protected $validationRules    = [];    
 //protected $validationMessages = [];    
protected $skipValidation     = false;
}