<?php 

namespace App\Models;

use CodeIgniter\Model;

class GhgModel extends Model{

	protected $table      = 'ghg';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $useSoftDeletes = true;



    protected $allowedFields = ['ghg_name','ghg_category_id','footprint_id', 'user_id', 'boundary_id','status','item_allowed'];



    protected $useTimestamps = true;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

    protected $deletedField  = 'deleted_at';



    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;

}



