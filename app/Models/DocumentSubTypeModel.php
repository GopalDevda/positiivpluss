<?php 
namespace App\Models;
use CodeIgniter\Model;
class DocumentSubTypeModel extends Model{
	protected $table      = 'document_sub_type';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['document_type_name','document_sub_type_name', 'user_id', 'details','status'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}

