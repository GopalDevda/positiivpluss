<?php 



namespace App\Models;



use CodeIgniter\Model;



class BrandModel extends Model{



	protected $table      = 'brand';



    protected $primaryKey = 'id';







    protected $useAutoIncrement = true;







    protected $returnType     = 'array';



    protected $useSoftDeletes = false;







    protected $allowedFields = ['brand_name','brand_id','add','edit','delete','view','role_id','plan_id','status'];







    protected $useTimestamps = false;



    protected $createdField  = 'created_at';



    protected $updatedField  = 'updated_at';



//    protected $deletedField  = 'deleted_at';







    //protected $validationRules    = [];



    //protected $validationMessages = [];



    protected $skipValidation     = false;



}







