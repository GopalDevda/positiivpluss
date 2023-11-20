<?php 



namespace App\Models;



use CodeIgniter\Model;



class DisclosureModel extends Model{



	protected $table      = 'disclosure';



    protected $primaryKey = 'id';



    protected $useAutoIncrement = true;



    protected $returnType     = 'array';



    protected $useSoftDeletes = true;







    protected $allowedFields = ['disclosure_name','indicator_id','disclosure_category_id', 'user_id','status','standard_id','sub_classification_id','classification_id','unit_id'];







    protected $useTimestamps = true;



    protected $createdField  = 'created_at';



    protected $updatedField  = 'updated_at';



    protected $deletedField  = 'deleted_at';







    //protected $validationRules    = [];



    //protected $validationMessages = [];



    protected $skipValidation     = false;



}







