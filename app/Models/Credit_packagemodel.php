<?php

namespace App\Models;

use CodeIgniter\Model;

class Credit_packagemodel extends Model
{
    protected $table      = 'credit_package';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;
    protected $allowedFields =
    ['min_credit', 'max_credit', 'price', 'description', 'status', 'created_at',];
}
