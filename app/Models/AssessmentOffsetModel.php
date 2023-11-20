<?php 

namespace App\Models;

use CodeIgniter\Model;

class AssessmentOffsetModel extends Model{

	protected $table      = 'assessment_offset';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['name','description', 'photo', 'price', 'status','user_id','stripe_product_id'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;

}



