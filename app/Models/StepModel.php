<?php 

namespace App\Models;

use CodeIgniter\Model;

class StepModel extends Model{

	protected $table      = 'steps';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $useSoftDeletes = true;

    protected $allowedFields = ['uniq_spl','id','tool_issue_id', 'supplier_id','owner_id','incident_type','location','date_time','shift','mach_no_exa_loc','description','extend_damage','immediate_action_taken','media_attach','victim_status','victim_type','victim_name','gender','age_range','body_mark','injurys_detail','status','hospitalized','treatment_detail','step1','st_2_Inv_t_lead','st_2_Inv_t_memb','st_2_target_date_time','step2','st_3_m1','st_3_Machine_des','st_3_man1','st_3_Man_des','st_3_Material1','st_3_Material1_des','st_3_Enviroment1','st_3_Enviroment_des','st_3_System','step3','st_4_des_action','st_4_type','st_4_responsibilty','st_4_target_date','step_4','approve','st_5_status','st_5_remark','step5'];

    protected $useTimestamps = true;

    protected $createdField  = 'create_on';

    protected $updatedField  = 'update_on';

    protected $deletedField  = 'deleted_at';



    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;

}



