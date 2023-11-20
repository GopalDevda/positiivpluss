<?php 

namespace App\Models;

use CodeIgniter\Model;

class StakeholderModel extends Model{

	protected $table      = 'stakeholder';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $useSoftDeletes = true;



    protected $allowedFields = ['stakeholder_name', 'user_id','status'];



    protected $useTimestamps = true;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

    protected $deletedField  = 'deleted_at';



    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;

}



