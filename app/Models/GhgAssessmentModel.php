<?php 

namespace App\Models;

use CodeIgniter\Model;

class GhgAssessmentModel extends Model{

	protected $table      = 'ghg_assessment';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $useSoftDeletes = true;



    protected $allowedFields = ['footprint_id', 'supplier_id','country_id','no_of_employee','date_from','date_to','datetime','emp_work_from_home','total_footprint','status'];



    protected $useTimestamps = true;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

    protected $deletedField  = 'deleted_at';



    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;

}



