<?php 
namespace App\Models;
use CodeIgniter\Model;
class SensorModel extends Model{
	protected $table      = 'sensors';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array'; 
    protected $useSoftDeletes = false;
protected $allowedFields = 
['boundary_id','subboundary_id','board_type','provider_type','username','password','current_status','status','supplier_id','owner_id','timestamp_date','sub_site','kn_no','consumer_no','account_no','mobile_no','service_no','ca_no'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}