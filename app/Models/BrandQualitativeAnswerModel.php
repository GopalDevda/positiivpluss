<?php

namespace App\Models;

use CodeIgniter\Model;

class BrandQualitativeAnswerModel extends Model
{
    protected $table      = 'brand_qualitative_answer';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['supplier_id', 'owner_id', 'question_id', 'answer_id', 'answer', 'comment', 'media', 'indicator_id', 'status', 'latitude_location', 'longitude_location', 'signature', 'control_assesment_id', 'annotation_image', 'duration', 'imageName', 'media_name', 'onsite_comment', 'onsite_checked', 'remark'];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}
