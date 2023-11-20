<?php

namespace App\Models;

use CodeIgniter\Model;



class IndustryModel extends Model
{

    protected $table   = 'industry';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType   = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['industry_category_id', 'industry_name', 'user_id', 'status'];
    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $skipValidation   = false;
}
