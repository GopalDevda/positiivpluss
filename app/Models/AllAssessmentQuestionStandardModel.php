<?php namespace App\Models;use CodeIgniter\Model;class AllAssessmentQuestionStandardModel extends Model{	protected $table      = 'all_assessment_question_standard';    protected $primaryKey = 'id';    protected $useAutoIncrement = true;    protected $returnType     = 'array';    protected $useSoftDeletes = true;    protected $allowedFields = ['all_assessment_id','question_id','answeroption', 'standard_id','classification_id','user_id','status'];    protected $useTimestamps = false;    protected $createdField  = 'created_at';    protected $updatedField  = 'updated_at';    protected $deletedField  = 'deleted_at';    //protected $validationRules    = [];    //protected $validationMessages = [];    protected $skipValidation     = false;}