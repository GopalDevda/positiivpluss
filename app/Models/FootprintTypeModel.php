<?php 



namespace App\Models;



use CodeIgniter\Model;



class FootprintTypeModel extends Model{



	protected $table      = 'footprint_type';



    protected $primaryKey = 'id';



    protected $useAutoIncrement = true;



    protected $returnType     = 'array';



    protected $useSoftDeletes = true;







    protected $allowedFields = ['type_name','footprint_id', 'industry_id', 'user_id','status'];







    protected $useTimestamps = true;



    protected $createdField  = 'created_at';



    protected $updatedField  = 'updated_at';



    protected $deletedField  = 'deleted_at';







    //protected $validationRules    = [];



    //protected $validationMessages = [];



    protected $skipValidation     = false;



}







