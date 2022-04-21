<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PickPlace extends Model
{
    use HasFactory;

    public $table = 'pick_places';


    public $fillable = [
        'address',
        'municipality_id',
        'aditional_info',
        'profile_id'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'address' => 'string',
        'aditional_info' => 'string',
        'municipality_id' => 'integer',
        'profile_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'address' => 'required',
        'municipality_id' => 'required',
        'profile_id' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function profile()
    {
        return $this->hasOne(\App\Models\Frontend\Profile::class, 'profile_id', 'id');
    }

    public function municipality()
    {
        return $this->belongsTo(\App\Models\Backend\Municipality::class, 'municipality_id', 'id');
    }
}
