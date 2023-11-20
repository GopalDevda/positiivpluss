<?php 



namespace App\Models;



use CodeIgniter\Model;



class SubUnitModel extends Model{



	protected $table      = 'sub_units';



    protected $primaryKey = 'id';



    protected $useAutoIncrement = true;



    protected $returnType     = 'array';



    protected $useSoftDeletes = true;







    protected $allowedFields = ['unit_id','sub_unit_name','conversion_value','conversion_symbol','status','user_id','unit_category'];







    protected $useTimestamps = true;



    protected $createdField  = 'created_at';



    protected $updatedField  = 'updated_at';



    protected $deletedField  = 'deleted_at';







    //protected $validationRules    = [];



    //protected $validationMessages = [];



    protected $skipValidation     = false;



}







