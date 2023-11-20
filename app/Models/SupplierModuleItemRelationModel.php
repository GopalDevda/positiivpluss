<?php 



namespace App\Models;



use CodeIgniter\Model;



class SupplierModuleItemRelationModel extends Model{



	protected $table      = 'supplier_module_item_relations';



    protected $primaryKey = 'id';







    protected $useAutoIncrement = true;







    protected $returnType     = 'array';



    protected $useSoftDeletes = false;







    protected $allowedFields = ['supplier_role_id','supplier_module_id','supplier_module_item_id','supplier_plan_id','status'];







    protected $useTimestamps = false;



    protected $createdField  = 'created_at';



    protected $updatedField  = 'updated_at';



    // protected $deletedField  = 'deleted_at';







    //protected $validationRules    = [];



    //protected $validationMessages = [];



    protected $skipValidation     = false;



}







