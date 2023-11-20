<?php

namespace App\Models;

use CodeIgniter\Model;

class Control_assessment extends Model
{
    protected $table      = 'control_assessment';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    // protected $useSoftDeletes = false;
    protected $allowedFields = [
        "copy", 
        "boundary",
        "sub_boundary",
        "indicator",
        "assigned_to",
        "owner_id",
        "frequency",
        "comment", "num_show",
        "due_date",
        "start_date",
        "priority",
        "complete",
        "status",
        "updated_at",
        "created",
        "deleted_at",
        "supplier_id",
        "uniq_spl",
        "step3_complete",
        "reminder_send",
        "completed_at",
        "weightage_per",
        "failed_per",
        "ass_que_count",
        "supplier_uniq",
        "addsupplier_id",
        "overall_submit",
        "per_overall",
        
    ];



    protected $useTimestamps = false;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

    protected $deletedField  = 'deleted_at';



    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;
}
