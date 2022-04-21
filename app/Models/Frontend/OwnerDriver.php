<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Eloquent as Model;

class ownerDriver extends Model
{
    use HasFactory;

    public $table = 'owners_drivers';
    

    public $fillable = [
        'owner_id',
        'driver_id',
        'start_date',
        'end_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'owner_id' => 'integer',
        'driver_id' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'owner_id' => 'required',
        'driver_id' => 'required',
        'start_date' => 'required'
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

}
