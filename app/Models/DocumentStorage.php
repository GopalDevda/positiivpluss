<?php 

namespace App\Models;

use CodeIgniter\Model;

class DocumentStorage extends Model{

	protected $table      = 'document_Storage';

    protected $primaryKey = 'id';



    protected $useAutoIncrement = true;



    protected $returnType     = 'array';

    // protected $useSoftDeletes = true;



    protected $allowedFields = ['user_id', 'limit','unit','status'];



    protected $useTimestamps = true;

    protected $createdField  = 'create_on';

    protected $updatedField  = 'update_on';

    protected $deletedField  = 'delete_on';



    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;

}



