<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TypeVehicle
 * @package App\Models\Backend
 * @version February 18, 2022, 4:13 pm UTC
 *
 * @property integer $id
 * @property string $name
 * @property number $price
 */
class TypeVehicle extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'type_vehicles';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'price',
        'url_photo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'price' => 'float',
        'url_photo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'price' => 'required',
        'url_photo' => 'required'
    ];

    
}
