<?php

namespace App\Models;

use CodeIgniter\Model;

class ReportbuilerModel extends Model
{
    protected $table      = 'report_builder';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields =
    [
        "name",
        "start_date",
        "end_date",
        "standard_id",
        "indicator_id",
        "status",
        "created_at",
        "updated_at",
        "deleted_at",

    ];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    protected $skipValidation     = false;
}
