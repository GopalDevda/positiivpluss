<?php 

namespace App\Models;

use CodeIgniter\Model;

class SdgTargetModel extends Model{

	protected $table      = 'goal_target';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $useSoftDeletes = true;



    protected $allowedFields = ['target_name','sdg_id', 'user_id','status'];



    // protected $useTimestamps = true;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

    // protected $deletedField  = 'deleted_at';



    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;

}



