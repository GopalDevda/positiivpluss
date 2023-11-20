<?php

namespace App\Models;

use CodeIgniter\Model;

class Quantitative_Footprint_Model extends Model
{
	protected $table      = 'quantitative_footprint';
	protected $primaryKey = 'id';
	protected $useAutoIncrement = true;
	protected $returnType     = 'array';
	protected $useSoftDeletes = false;
	protected $allowedFields = [
		'supplier_id',
		'owner_id',
		'form_id',
		'name',
		'footprint_id',
		'value',
		'unit',
		'status',
		'from_date',
		'to_from_date',
		'completed_by',
		'material',
		'quantity',
		'transport_type'
	];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $skipValidation     = false;
}
