<?php 

namespace App\Models;

use CodeIgniter\Model;

class SubSubIndustryModel extends Model{

	protected $table      = 'SubSubIndustry';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $useSoftDeletes = true;

    protected $allowedFields = ['id', 'industry_cat','industry','subsubindustry','status'];

    protected $useTimestamps = false;

   // protected $updatedField  = 'updated_at';

    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;

}

