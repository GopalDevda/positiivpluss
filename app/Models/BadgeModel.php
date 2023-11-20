<?php 

namespace App\Models;

use CodeIgniter\Model;

class BadgeModel extends Model{

	protected $table      = 'badge';

    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['badge_name', 'badge_image','badge_description','badge_no_of_question','status', 'user_id'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;

}
