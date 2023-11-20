<?php 

namespace App\Models;

use CodeIgniter\Model;

class CourseModule extends Model{

	protected $table      = 'training-courses-module';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $useSoftDeletes = true;



    protected $allowedFields = ['course','modulename','card_type','contenttitle','contentdiscription','contenttitle1','contentdiscription1','contenttitle2','contentdiscription2','status'];



    protected $useTimestamps = true;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

    protected $deletedField  = 'deleted_at';



    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;

}



