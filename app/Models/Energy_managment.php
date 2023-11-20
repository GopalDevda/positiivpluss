<?php 

namespace App\Models;

use CodeIgniter\Model;

class Energy_managment extends Model{

	protected $table      = 'energy_managment';

    protected $primaryKey = 'id';



    protected $useAutoIncrement = true;



    protected $returnType     = 'array';

    protected $useSoftDeletes = true;



    protected $allowedFields = ['supplier_id','sub_e_type','financial_year','owner_id','sub_disclosure_id','sub_class_id','disclosure_id','energy','type','value','unit','boundary_id','site_id','comment','file','start_date','end_date','q1_comment','q2_comment','activities','energy_intensity_type','intensity_ratio','energy_con_ratio','reduction_type','reduction_retio','base_year','title','yes_no','image','status','data_id','frequency','monthly_name','connect','sensorId','indicator_id'];



    protected $useTimestamps = false;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

    protected $deletedField  = 'deleted_at';



    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;

}

