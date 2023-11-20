<?php 
namespace App\Models;
use CodeIgniter\Model;
class ModuleRoleModel extends Model{
	protected $table      = 'module_role';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['role_name','status'];

    protected $useTimestamps = true;
    protected $createdField  = 'create_on';
    protected $updatedField  = 'update_on';
    protected $deletedField  = 'delete_on';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}

