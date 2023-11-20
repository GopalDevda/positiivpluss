<?php 
namespace App\Models;
use CodeIgniter\Model;
class LoginModel extends Model{
	protected $table = 'admin';
	protected $allowedFields = ['id','email','password','status','create_on'];
}
