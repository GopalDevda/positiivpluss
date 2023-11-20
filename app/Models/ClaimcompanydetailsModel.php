<?php

namespace App\Models;

use CodeIgniter\Model;

class ClaimcompanydetailsModel extends Model
{
    protected $table  = 'claimcompany_details';
    protected $allowedFields = [
        'name', 'email', 'company_organization_name', 'contact', 'designation', 'cin_number', 'status', 'created_at',
    ];
}
