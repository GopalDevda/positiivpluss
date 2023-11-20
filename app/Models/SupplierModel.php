<?php

namespace App\Models;

use CodeIgniter\Model;

class SupplierModel extends Model
{

    protected $table      = 'supplier';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $useSoftDeletes = true;

    protected $allowedFields =
    [
        'supplier_name', 'last_name', 'current_address', 'permanent_address', 'country_id', 'pass',
        'state_id', 'industry_category_id', 'user_address',
        'industry_id', 'otp', 'age', 'mobile', 'email', 'password', 'currency', 'bio', 'language', 'employee_code', 'role', 'added_by',
        'is_email_verify', 'status', 'nameproof', 'addressproof',
        'supplier_plan_id', 'image', 'zipcode', 'status', 'brand_name', 'website', 'date_joining', 'description', 'stripe_customer_id',
        'dashboard_access', 'address', 'employee_id', 'turnover', 'socials', 'percentage', 'activities', 'mission', 'owner_id', 'department', 'emp_position_name', 'position', 'multiple_country', 'unit_id', 'bannerImage', 'assign_position', 'state_id_account', 'country_account', 'designation', 'login_active', 'supplier_paid', 'supplier_access'
    ];

    protected $useTimestamps = true;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

    protected $deletedField  = 'deleted_at';

    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;
}
