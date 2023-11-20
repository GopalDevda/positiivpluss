<?php 
namespace App\Models;
use CodeIgniter\Model;
class ModuleItemModel extends Model{
	protected $table      = 'module_item';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['module_id','item_name', 'link','icon','user_id','status'];

    protected $useTimestamps = true;
    protected $createdField  = 'create_on';
    protected $updatedField  = 'update_on';
    protected $deletedField  = 'delete_on';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}

