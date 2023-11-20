<?php

namespace App\Models;

use CodeIgniter\Model;

class QuantitativeFootprintAnswerModel extends Model
{
    protected $table      = 'quantitative_footprint_answer';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = [
        'completed_by',
        'owner_id',
        'footprint_id',
        'departure',
        'arrival',
        'people',
        'nights',
        'vehical_before',
        'type_name_before',
        'model_name_before',
        'trip_class',
        'travel_from',
        'travel_to',
        'vehical_after',
        'model_name_after',
        'type_name_after',
        'refrigrants_unit',
        'refrigrants',
        'wood_unit',
        'wood',
        'natural_gas_unit',
        'natural_gas',
        'electricity_unit',
        'electricity',
        'mileage',
        'water_supply',
        'water_supply_unit',
        'waste_water',
        'waste_water_unit',
        'tap_water',
        'tap_water_unit',
        'add_process',
        'quantity',
        'supplier_location',
        'material',
        'unit',
        'choose_vehicle',
        'year',
        'emision',
        'type_name',
        'model_name',
        'factor',
        'from_date',
        'to_from_date',
        'consumption_sub_category',
        'consumption',
        'finance',
        'sub_finance',
        'ghg_factor',
        'location_from',
        'location_to',
        'driving_to',
        'driving_from',
        'driving',
        'form_id',
        'distance',
        'admin_verify',
        'admin_verify_by',
        'admin_verify_date', 'footprint_value',
        'status'
    ];
    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    //    protected $deletedField  = 'deleted_at';
    //protected $validationRules    = [];
    //protected $validationMessages = [];
    protected $skipValidation     = false;
}
