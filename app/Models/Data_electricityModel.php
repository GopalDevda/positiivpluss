<?php 
namespace App\Models;
use CodeIgniter\Model;
class Data_electricityModel extends Model{
	protected $table      = 'data_electricity';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array'; 
    protected $useSoftDeletes = false;
protected $allowedFields = 
['electricity_id','bill_no','consume_unit','demand_load','period_from_date','to_date','year','senstion','currentdatetime','power_load','status','bill_date','pdf_file','amount','frequency','monthly_name'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}