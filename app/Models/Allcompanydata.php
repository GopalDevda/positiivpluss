<?php

namespace App\Models;

use CodeIgniter\Model;

class Allcompanydata extends Model
{
    protected $table  = 'all_company_data';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType  = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        "corporate_identification_number",
        "company_name",
        "company_status",
        "company_class",
        "company_category",
        "company_sub_category",
        "date_of_registration",
        "registered_state",
        "authorized_cap",
        "paidup_capital",
        "industrial_class",
        "principal_bussiness_activity_as_per_cin",
        "registered_office_address",
        "registrar_of_companies",
        "email_addr",
        "latest_year_ar",
        "latest_year_bs",
        "status",
        "created_at",
        "updated_at",
        "deleted_at",
        "pppid",


    ];
    protected $useTimestamps = false;
    protected $skipValidation  = false;
}
