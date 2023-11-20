<?php
namespace App\Models;
use CodeIgniter\Model;
class Supplier_assessment extends Model{
    protected $table      = 'supplier_assessment';
protected $primaryKey = 'id';
protected $useAutoIncrement = true;
protected $returnType     = 'array';
protected $useSoftDeletes = true;
protected $allowedFields = ['assessment_id','supplier_id', 'date_from','is_submit','date_to','submit_datetime','is_verify','submit_datetime','total_question','total_answer','assessment_per','date','datetime','status','footprint_id','country_id','no_of_employee','building_size','carbon_footprint_date_from','emp_work_from_home','total_footprint','admin_verify','admin_verify_by','admin_verify_date','cp_name','cp_type_id','cp_address','cp_pin','cp_collection','cp_unit','cp_sku','cp_image','weight','unit_id','turnover_contribution','product_life','lease_owned','industry_id','size','website','discription','lifeunit_id','branch_code','state_id','electricity_board','username','password','step1','owner_id','pincode','city_id'];
protected $useTimestamps = true;
protected $createdField  = 'created_at';
protected $updatedField  = 'updated_at';
protected $deletedField  = 'deleted_at';
//protected $validationRules    = [];
//protected $validationMessages = [];
protected $skipValidation     = false;
}