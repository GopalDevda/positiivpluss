<?php
namespace App\Models;
use CodeIgniter\Model;
class BlogModel extends Model{
    protected $table      = 'blog';
protected $primaryKey = 'id';
protected $useAutoIncrement = true;
protected $returnType     = 'array';
protected $useSoftDeletes = true;

protected $allowedFields = ['type', 'heading','url','report','image','description','status'];

protected $useTimestamps = false;
protected $createdField  = 'created_on';
protected $updatedField  = 'updated_on';
protected $deletedField  = 'delete_on';
//protected $validationRules    = [];
//protected $validationMessages = [];
protected $skipValidation     = false;
}