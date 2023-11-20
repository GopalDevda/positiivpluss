<?php

namespace App\Models;

use CodeIgniter\Model;

class assessment_template_model extends Model
{
    protected $table  = 'assessment_template';
    protected $allowedFields = [
        'indicator_ids', 'select_question_id','owner_id', 'comment',  'status', 'supplier_id', 'weightage_per', 'failed_per','template_name'
    ];
}