<?php 

namespace App\Models;

use CodeIgniter\Model;

class Sub_siteModel extends Model{

	protected $table      = 'sub_site';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $useSoftDeletes = true;

    protected $allowedFields =
    ['supplier_id','owner_id','site_id','sub_site_name','sub_site_type','country','state','sub_site_address','sub_site_area','property_type','status','unit_id'];

    protected $useTimestamps = true;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

    protected $deletedField  = 'deleted_at';

    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;

}