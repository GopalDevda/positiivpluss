<?php 



namespace App\Models;



use CodeIgniter\Model;



class ElectricityModel extends Model{



	protected $table      = 'electricity_board';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $useSoftDeletes = true;

    protected $allowedFields = ['name_discom','state','uniq_id','type','status','abbrevation','status'];

    protected $useTimestamps = true;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

    protected $deletedField  = 'deleted_at';

    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;



}







