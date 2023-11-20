<?php

namespace App\Models;

use CodeIgniter\Model;

class AboutModel extends Model
{

    protected $table      = 'cms';

    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';

    protected $useSoftDeletes = true;

    protected $allowedFields = ['id', 'title', 'description', 'user_id'];

    protected $useTimestamps = false;

    // protected $updatedField  = 'updated_at';

    //protected $validationRules    = [];

    //protected $validationMessages = [];

    protected $skipValidation     = false;
}
