<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Quota
 * @package App\Models\Backend
 * @version February 18, 2022, 4:14 pm UTC
 *
 * @property \App\Models\Backend\TypeVehicle $typeVehicle
 * @property integer $id
 * @property string $months_number 
 * @property number $price
 * @property integer $type_vehicle_id
 */
class Quota extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'quotas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'months_number',
        'price',
        'type_vehicle_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'months_number' => 'string',
        'price' => 'float',
        'type_vehicle_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'months_number' => 'required',
        'price' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function typeVehicle()
    {
        return $this->belongsTo(\App\Models\Backend\TypeVehicle::class, 'type_vehicle_id', 'id');
    }
}
