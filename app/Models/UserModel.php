<?php 
namespace App\Models;
use CodeIgniter\Model;
class UserModel extends Model{
	protected $table      = 'admin';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['user_role', 'name','email','address','zipcode','phone','profile_pic','password','status'];

    protected $useTimestamps = true;
    protected $createdField  = 'create_on';
    protected $updatedField  = 'update_on';
    protected $deletedField  = 'delete_on';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}

