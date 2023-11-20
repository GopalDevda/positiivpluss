<?php

namespace App\Models;

use CodeIgniter\Model;

class ClaimProfile extends Model
{
    protected $table      = 'Claim_profile';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields =
    ['cinno', 'name', 'email', 'contact_no', 'association_company', 'to_email', 'status', 'uniq_number'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $skipValidation     = false;
}
