<?php

namespace App\Models;

use CodeIgniter\Model;

class QualitativeSubmitAnswerModel extends Model
{
    protected $table      = 'qualitative_submit_answer';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['supplier_id', 'owner_id', 'question_id', 'answer_id', 'answer', 'comment', 'media', 'indicator_id', 'status', 'latitude_location', 'longitude_location', 'signature', 'qualitative_assesment_id', 'annotation_image', 'duration', 'imageName'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $skipValidation     = false;
}
