<?php 

namespace App\Models;

use CodeIgniter\Model;

class Toolissue extends Model{

	protected $table      = 'tool_issue';

    protected $primaryKey = 'id';



    protected $useAutoIncrement = true;



    protected $returnType     = 'array';

    protected $useSoftDeletes = true;



    protected $allowedFields = 
    ['id', 'issue_type','uniq_spl', 'title_issue','assign','description','status','coused','priority','color','user_id','site','step_complete'];



    protected $useTimestamps = true;

    protected $createdField  = 'create_on';

    protected $updatedField  = 'update_on';

    protected $deletedField  = 'deleted_at';



    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;

}



