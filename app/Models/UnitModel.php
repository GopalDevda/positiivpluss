<?php 



namespace App\Models;



use CodeIgniter\Model;



class UnitModel extends Model{



	protected $table      = 'unit';



    protected $primaryKey = 'id';



    protected $useAutoIncrement = true;



    protected $returnType     = 'array';



    protected $useSoftDeletes = true;







    protected $allowedFields = ['unit_name', 'user_id','status','unit_category'];







    protected $useTimestamps = true;



    protected $createdField  = 'created_at';



    protected $updatedField  = 'updated_at';



    protected $deletedField  = 'deleted_at';







    //protected $validationRules    = [];



    //protected $validationMessages = [];



    protected $skipValidation     = false;



}







