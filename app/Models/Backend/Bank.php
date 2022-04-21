<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Bank
 * @package App\Models\Backend
 * @version February 18, 2022, 4:11 pm UTC
 *
 * @property integer $id
 * @property string $name
 * @property tinyInteger $status
 */
class Bank extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'banks';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'status',
        'type_account_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'type_account_id'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'status' => 'required'
    ];

    
}
