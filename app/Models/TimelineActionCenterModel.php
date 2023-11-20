<?php 
namespace App\Models;
use CodeIgniter\Model;
class TimelineActionCenterModel extends Model{
	protected $table      = 'timeline_action_center';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array'; 
    protected $useSoftDeletes = false;
    protected $allowedFields = ['supplier_id','TitleAdd','description','status','action_center_id','assigned','deadline','owner_id'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}