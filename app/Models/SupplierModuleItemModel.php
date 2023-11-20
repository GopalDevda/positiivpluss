<?php 
namespace App\Models;
use CodeIgniter\Model;
class SupplierModuleItemModel extends Model{
	protected $table      = 'supplier_module_item';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['supplier_module_id','item_name', 'link','icon','user_id','status'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}

