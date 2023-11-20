<?php 
namespace App\Models;
use CodeIgniter\Model;
class ControlFootprintModel extends Model{
	protected $table      = 'control_footprints';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array'; 
    protected $useSoftDeletes = false;
    protected $allowedFields = ['boundary', 'sub_boundary', 'ghg', 'assigned_to', 'owner_id', 'frequency', 'comment', 'due_date', 'start_date', 'priority', 'complete', 'status', 'updated_at', 'created-at', 'deleted_at', 'supplier_id'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
//    protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}