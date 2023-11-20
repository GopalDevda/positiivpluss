<?php 

namespace App\Models;

use CodeIgniter\Model;

class HotelStayModel extends Model{

    protected $table      = 'hotel_stay_detail';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = true;
    protected $allowedFields = ['country_id','no_of_person', 'no_of_night', 'emission', 'status'];
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;

}



