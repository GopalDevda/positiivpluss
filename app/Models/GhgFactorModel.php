<?php 

namespace App\Models;

use CodeIgniter\Model;

class GhgFactorModel extends Model{

	protected $table      = 'ghg_factor';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $useSoftDeletes = true;



    protected $allowedFields = ['type','industry_id', 'ghg_category_id','ghg_id','country_id','group_id','name','impact','emission_factor','user_id','status','source'];



    protected $useTimestamps = true;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

    protected $deletedField  = 'deleted_at';



    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;

}



