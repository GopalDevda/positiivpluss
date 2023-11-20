<?php 
namespace App\Models;
use CodeIgniter\Model;
class ModuleModel extends Model{
	protected $table      = 'module';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['module_name', 'link','icon','user_id','status'];

    protected $useTimestamps = true;
    protected $createdField  = 'create_on';
    protected $updatedField  = 'update_on';
    protected $deletedField  = 'delete_on';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}

