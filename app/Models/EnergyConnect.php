<?php 



namespace App\Models;



use CodeIgniter\Model;



class EnergyConnect extends Model{



	protected $table      = 'energy_connect';



    protected $primaryKey = 'id';



    protected $useAutoIncrement = true;



    protected $returnType     = 'array';



    protected $useSoftDeletes = true;



    protected $allowedFields = ['id','supplier_id','owner_id','disclosure_id','sub_disclosure_id','sub_class_id','site_id','start_date','end_date','title','status','frequency','monthly_name','consume_unit'];



    protected $useTimestamps = false;



   // protected $updatedField  = 'updated_at';



    //protected $validationRules    = [];



    //protected $validationMessages = [];



    protected $skipValidation     = false;



}



