<?php 



namespace App\Models;

use CodeIgniter\Model;



class QuickStartModel extends Model{

	protected $table      = 'quick_start';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $useSoftDeletes = false;

    protected $allowedFields = ['owner_id','country','number','number_of_state','offices','plants','location', 'women_total','women_gen','women_bord','differently_per','differently_emp','differently_gen','differently_total','differently_total','employee_total','employee_gen','employee_wor','employee_per','net_worth','name_hol','location_6','industry_name','sub_industry_name','percentage','whether','cturnover','financial_year','holding_percentageee','activity_industry','activity_subindustry','activity_activities','activity_percentagee','product_servicesss','nic_codee','mission','socials','website','description','status','company_email','company_mobile','inter_country','operation_percantage','link','twiter','step1','step2','step3','step4','step5','national','international','turnover'];

    protected $useTimestamps = false;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

//    protected $deletedField  = 'deleted_at';

    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;

}