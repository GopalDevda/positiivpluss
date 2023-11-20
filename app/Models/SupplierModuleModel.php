<?php 

namespace App\Models;

use CodeIgniter\Model;

class SupplierModuleModel extends Model{

	protected $table      = 'supplier_module';

    protected $primaryKey = 'id';



    protected $useAutoIncrement = true;



    protected $returnType     = 'array';

    protected $useSoftDeletes = false;



    protected $allowedFields = ['supplier_module_name', 'link','icon','user_id','status'];



    protected $useTimestamps = false;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

//    protected $deletedField  = 'deleted_at';



    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;

}



