<?php 
namespace App\Models;
use CodeIgniter\Model;
class linkModel extends Model{
    
	protected $table      = 'link_expire';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;

    protected $allowedFields = ['csrf_token','time','planid','status'];
    
    protected $useTimestamps = true;
    protected $createdField  = 'time';
   

    
}

