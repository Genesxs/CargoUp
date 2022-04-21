<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vehicle extends Model
{

    use HasFactory;

    public $table = 'vehicles';
    

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
