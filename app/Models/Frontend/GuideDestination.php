<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuideDestination extends Model
{
    use HasFactory;

    public $table = 'guide_destinations';


    public $fillable = [
        'guide_detail_id',
        'destination_id'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'guide_detail_id' => 'integer',
        'destination_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'guide_detail_id' => 'required',
        'destination_id' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function guide()
    {
        return $this->belongsTo(\App\Models\Frontend\GuideDetail::class, 'guide_detail_id', 'id');
    }

    public function destiny()
    {
        return $this->belongsTo(\App\Models\Frontend\Destination::class, 'destination_id', 'id');
    }
}
