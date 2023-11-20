<?php 



namespace App\Models;



use CodeIgniter\Model;



class SupplierSubsidiaryModel extends Model{



	protected $table      = 'supplier_subsidiary';



    protected $primaryKey = 'id';



    protected $useAutoIncrement = true;



    protected $returnType     = 'array';



    protected $useSoftDeletes = true;



    protected $allowedFields = ['id', 'name','address','industry','sub_industry','percentage','supplier_id','status','deleted_at','nic_code'];



    protected $useTimestamps = false;



   // protected $updatedField  = 'updated_at';



    //protected $validationRules    = [];



    //protected $validationMessages = [];



    protected $skipValidation     = false;



}



