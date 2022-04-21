<?php

namespace App\Models\Backend;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Municipality
 * @package App\Models\Backend
 * @version December 3, 2021, 6:47 pm UTC
 *
 * @property \App\Models\Backend\Department $department
 * @property string $name
 * @property int $code
 * @property string $complete_code
 * @property integer $department_id
 */
class Municipality extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'municipalities';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'code',
        'complete_code',
        'department_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'complete_code' => 'string',
        'department_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'code' => 'required',
        'complete_code' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function department()
    {
        return $this->belongsTo(\App\Models\Backend\Department::class, 'department_id', 'id');
    }
}
