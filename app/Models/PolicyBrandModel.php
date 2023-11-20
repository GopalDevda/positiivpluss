<?php 

namespace App\Models;

use CodeIgniter\Model;

class PolicyBrandModel extends Model{

	protected $table      = 'policy_brand';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $useSoftDeletes = true;



    protected $allowedFields = ['policy_name','policy_details','policy_status','owner_id','version','approved_on', 'approved_by','acknowledge_by', 'policy_id','created_by','file','status'];



    protected $useTimestamps = false;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

    // protected $deletedField  = 'deleted_at';



    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;

}



