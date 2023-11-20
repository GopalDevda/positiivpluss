<?php 
namespace App\Models;

use CodeIgniter\Model;

class Universal extends Model {
$db = \Config\Database::connect('default');
	
protected $table => 'admin';
protected $allowedFields => ['name','email','password'];
protected $where;
		
	// // protected $table = 'admin';
	public function insert($table,$data){
		$que = $this->db->insert_string($table,$data);
		$this->db->query($que);
		$id=$this->db->insert_id();
		if($id) { return $id; } else { return false; }
	}

	public function update($table,$data,$where){
		$this->db->where($where);
		$rs=$this->db->update($table,$data);
		if($rs) { return true; } else { return false; } 
	}

	public function delete($table,$where){
		$rs=$this->db->delete($table,$where);
		if($rs) { return true; } else { return false; } 
	}

	public function get($tbname,$fieldName='', $orderType=''){
		if($fieldName!=''){
			$this->db->order_by($fieldName, $orderType);
		}
		$query = $this->db->get($tbname);
		return $query->result_array();	
	}
	
	public function getDataByid($tbname,$data){
		$this->db->where($data);
		$query = $this->db->get($tbname);
		if($query->num_rows == 1)
		{
			$row = $query->row();
			return $row;
		}
		else{ 
		return false; 
		}
	}


	public function getWhereData($tbname,$data){
		$this->db->where($data);
		$query = $this->db->get($tbname);
		if($query->result_id->num_rows > 0)
		{
			$row = $query->result_array();
			return $row;
		}
		else { return false; }
	}

	public function getWhereOrderData($tbname,$data,$fname,$otype)	{
		$this->db->where($data);
		$this->db->order_by($fname, $otype);
		$query = $this->db->get($tbname);
		if($query->result_id->num_rows > 0)
		{
			$row = $query->result_array();
			return $row;
		}
		else { return false; }
	}


	public function getRawQuery($sql)	{
		$query =$this->db->query($sql);
		return $query->result_array();	
	}
	 
	public function getRawQuerySingle($sql)	{
		 $query =$this->db->query($sql);
		 if($query->num_rows == 1)
		{
			$row = $query->row();
			return $row;
		}
		else{ 
		return false; 
		}
	}

	public function getJoinData($firsttb,$secondtp,$fname,$sname,$wherefield,$val){
	    $this->db->select('*');
		$this->db->from($firsttb);
		$this->db->join($secondtp, "$secondtp.$sname = $firsttb.$fname"); 
		$this->db->where("$secondtp.$wherefield", $val);
		$query = $this->db->get();
		return $query->result();
	}


	public function getWhereDataByLimit($tbname,$data,$fname,$limit,$otype)
	{
		$this->db->where($data);
		$this->db->limit($limit);
		$this->db->order_by($fname, $otype);
		$query = $this->db->get($tbname);
		if($query->num_rows > 0)
		{
			$row = $query->result_array();
			return $row;
		}
		else { return false; }
	}

	public function getGreaterData($sql)
	{
		$query = $this->db->query($sql);
		if($query->num_rows > 0)
		{
			$row = $query->num_rows();
			return $row;
		}
		else { return false; }
	}

	public function fetch_condrecordwithfield($tbname,$data,$fname)
	{
		$this->db->where($data);
		$this->db->select($fname);
		$query = $this->db->get($tbname);
		if($query->num_rows > 0)
		{
			$row = $query->result_array();
			return $row;
		}
		else { return false; }
	}

	public function fetch_recordbylimit($tbname,$fname,$limit,$otype)
	{
		$this->db->limit($limit);
		$this->db->order_by($fname, $otype);
		$query = $this->db->get($tbname);
		if($query->num_rows > 0)
		{
			$row = $query->result_array();
			return $row;
		}
		else { return false; }
	}



} 