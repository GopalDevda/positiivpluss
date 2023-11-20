<?php 
namespace App\Models;
use CodeIgniter\Model;
class Automotion_alert extends Model{
	protected $table      = 'automotion_alert';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array'; 
    protected $useSoftDeletes = false;
protected $allowedFields = 
['supplier_id','owner_id','name','automotion_id','above','below','for_longer','assign_to','status'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}