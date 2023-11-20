<?php 



namespace App\Models;



use CodeIgniter\Model;



class RawmaterialDetailModel extends Model{



    protected $table      = 'raw_material_detail';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $useSoftDeletes = true;

    protected $allowedFields = ['industry_id','sub_industry_name','inputOutput','ghg_id', 'process_id', 'ghg_factor_id', 'user_id', 'status','per_quantity_val','per_quantity_amt','unit_id','processradio_id'];

    protected $useTimestamps = true;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

    // protected $deletedField  = 'deleted_at';

    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;



}

