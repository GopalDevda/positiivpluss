<?php 

namespace App\Models;

use CodeIgniter\Model;

class IndicatorModel extends Model{

    // function __construct() {

    //     $this->has_one['indicator_category']= array('IndicatorCategoryModel','indicator_category_id','id');

    //     parent::__construct();

    // }

	protected $table      = 'indicator';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $useSoftDeletes = true;



    protected $allowedFields = ['description','indicator_category_id','indicator_name','user_id','status','image'];



    protected $useTimestamps = true;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

    protected $deletedField  = 'deleted_at';



    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;

}



