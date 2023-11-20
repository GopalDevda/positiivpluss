<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierType extends Model
{
    protected $table      = 'supplier_type';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields =
    [
        'id', 'name', 'supplier_code', 'supplier_type', 'supplier_address', 'state', 'country', 'supplier_industry', 'city', 'status', 'supplier_id', 'owner_id', 'pincode', 'email', 'company_name'
    ];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}
