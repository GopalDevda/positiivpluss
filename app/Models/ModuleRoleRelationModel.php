<?php 
namespace App\Models;
use CodeIgniter\Model;
class ModuleRoleRelationModel extends Model{
	protected $table      = 'module_role_relations';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['role_id','module_id','module_item_id','status'];

    protected $useTimestamps = true;
    protected $createdField  = 'create_on';
    protected $updatedField  = 'update_on';
    protected $deletedField  = 'delete_on';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}

