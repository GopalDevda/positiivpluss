<?php 



namespace App\Models;



use CodeIgniter\Model;



class FlightDetailModel extends Model{



	protected $table      = 'flight_detail';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $useSoftDeletes = true;

    protected $allowedFields = ['flight_class','from_distance', 'to_distance', 'ghg_factor_id', 'user_id','status'];

    protected $useTimestamps = true;

    protected $createdField  = 'created_at';

    protected $updatedField  = 'updated_at';

    // protected $deletedField  = 'deleted_at';

    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;



}







