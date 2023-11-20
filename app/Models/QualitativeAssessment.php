<?php

namespace App\Models;

use CodeIgniter\Model;

class QualitativeAssessment extends Model
{
	protected $table                = 'qualitative_assessment';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement = true;
	protected $returnType     = 'array';
	protected $useSoftDeletes = false;
	protected $allowedFields = [
		"boundary",
		"sub_boundary",
		"indicator",
		"assigned_to",
		"owner_id",
		"frequency",
		"comment",
		"due_date",
		"start_date",
		"priority",
		"complete",
		"status",
		"updated_at",
		"created",
		"deleted_at",
		"supplier_id",
		"uniq_spl",
		"reminder_send",
		"completed_at",
		"num_show",

	];
	protected $useTimestamps = false;
	protected $createdField  = 'created_at';
	protected $updatedField  = 'updated_at';
	protected $deletedField  = 'deleted_at';
	protected $skipValidation     = false;
}
