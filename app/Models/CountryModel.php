<?php 



namespace App\Models;



use CodeIgniter\Model;



class CountryModel extends Model{



	protected $table      = 'countries';



    protected $primaryKey = 'id';



    protected $useAutoIncrement = true;



    protected $returnType     = 'array';



    protected $useSoftDeletes = false;







    protected $allowedFields = ['name','phonecode','sortname','emission_factor','continents','status','lat','lng'];







    protected $useTimestamps = false;



    protected $createdField  = 'created_at';



    protected $updatedField  = 'updated_at';



    protected $deletedField  = 'deleted_at';







    //protected $validationRules    = [];



    //protected $validationMessages = [];



    protected $skipValidation     = false;



}







