<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Discount
 * @package App\Models\Backend
 * @version December 3, 2021, 6:49 pm UTC
 *
 * @property number $percentage
 * @property string $start_date
 * @property string $end_date
 */
class Discount extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'discounts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'percentage',
        'start_date',
        'end_date'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'percentage' => 'double',
        'start_date' => 'date',
        'end_date' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'percentage' => 'required',
        'end_date' => 'required'
    ];

    
}
