<?php

namespace App\Models;

use CodeIgniter\Model;

class OnSiteModel extends Model
{
    protected $table      = 'onsite';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $allowedFields =
    [
        'supplier_id',
        'owner_id',
        'onsite',
        'supplier',
        'assessment',
        'assigned_to',
        'comment',
        'due_date',
        'priority',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
