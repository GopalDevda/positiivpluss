<?php

namespace App\Models;

use CodeIgniter\Model;

class ControlEnergryModel extends Model
{
    protected $table      = 'control_environment';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields =
    ['boundary', 'sub_boundary', 'ghg', 'assigned_to', 'owner_id', 'frequency', 'due_date', 'start_date', 'complete', 'status', 'financial_year', 'supplier_id', 'disclosure_id', 'disclosure_name', 'sub_disclosure', 'sub_clasification', 'start_datee', 'end_date', 'task_title', 'indicator', 'assign_dis_id', 'monthly'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    //    protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}
