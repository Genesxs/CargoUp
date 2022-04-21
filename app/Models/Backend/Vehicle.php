<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Vehicle
 * @package App\Models\Backend
 * @version March 8, 2022, 3:54 pm UTC
 *
 * @property \App\Models\Backend\TypeVehicle $typeVehicle
 * @property integer $id
 * @property string $badge
 * @property string $enrollment
 * @property string $class
 * @property string $capacity
 * @property integer $type_vehicle_id
 */
class Vehicle extends Model
{
    use SoftDeletes;

    use HasFactory;

    //status
    const ACTIVO = 1;
    const RETIRADO = 2;

    public $table = 'vehicles';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'badge',
        'capacity',
        'owner_id',
        'type_vehicle_id',
        'driver_id',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'badge' => 'string',
        'capacity' => 'string',
        'owner_id' => 'integer',
        'type_vehicle_id' => 'integer',
        'driver_id' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'badge' => 'required',
        'capacity' => 'required',
        'owner_id' => 'required',
        'type_vehicle_id' => 'required',
        'status' => 'required'
    ];

   
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function owner()
    {
        return $this->belongsTo(\App\Models\Frontend\Owner::class, 'owner_id', 'id');
    }

    public function driver()
    {
        return $this->belongsTo(\App\Models\Frontend\Driver::class, 'driver_id', 'id');
    }

    public function typeVehicle()
    {
        return $this->belongsTo(\App\Models\Backend\TypeVehicle::class, 'type_vehicle_id', 'id');
    }
}
