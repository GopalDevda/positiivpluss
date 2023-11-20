<?php 



namespace App\Models;



use CodeIgniter\Model;



class UserNotification extends Model{



	protected $table      = 'user_notification';



    protected $primaryKey = 'id';



    protected $useAutoIncrement = true;



    protected $returnType     = 'array';



    protected $useSoftDeletes = true;



    protected $allowedFields = ['id','owner_id','created_by','msg','for_y','link','readed','status','noti_read'];



    protected $useTimestamps = false;



   // protected $updatedField  = 'updated_at';



    //protected $validationRules    = [];



    //protected $validationMessages = [];



    protected $skipValidation     = false;



}



