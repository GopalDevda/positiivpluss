<?php 

namespace App\Models;

use CodeIgniter\Model;

class DocumentModel extends Model{

	protected $table      = 'supplier_document';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $useSoftDeletes = true;



    protected $allowedFields = ['supplier_id','document_type_id','document_sub_type_id','details','action_id','document_name','image','file_size','date','status','title','indicator_id','Qualitative_quantitative_id','documentadd'];



    protected $useTimestamps = true;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

    protected $deletedField  = 'deleted_at';



    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;

}



