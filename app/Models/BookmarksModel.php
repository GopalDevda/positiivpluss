<?php

namespace App\Models;

use CodeIgniter\Model;

class BookmarksModel extends Model
{
    protected $table  = 'bookmarks';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType  = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'supplier_id', 'company_id', 'status'
    ];
    protected $useTimestamps = false;
    protected $skipValidation  = false;
}
