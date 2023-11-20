<?php 



namespace App\Models;



use CodeIgniter\Model;



class ManufacturingDetailModel extends Model{



    protected $table      = 'manufacturing_detail';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $useSoftDeletes = true;

    protected $allowedFields = ['sub_industry_name','industry_id','inputOutput','ghg_id', 'process_id', 'ghg_factor_id', 'user_id', 'status','per_quantity_val','per_quantity_amt','unit_id','ghg_processradio_id'];

    protected $useTimestamps = true;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

    // protected $deletedField  = 'deleted_at';

    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;



}

