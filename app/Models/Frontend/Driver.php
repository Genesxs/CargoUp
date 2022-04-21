<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class driver extends Model
{
    use HasFactory;

    const COMPLETADO = 1;
    const APROBADO = 2;
    const DENEGADO = 3;

    public $table = 'drivers';
    

    public $fillable = [
        'url_photo',
        'url_curriculum',
        'experience',
        'jobs_name',
        'score',
        'url_documents',
        'municipality_id',
        'profile_id'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'url_photo' => 'string',
        'url_curriculum' => 'string',
        'jobs_name' => 'string',
        'score' => 'string',
        'url_documents' => 'string',
        'experience' => 'integer',
        'profile_id' => 'integer',
        'municipality_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'url_photo' => 'required',
        'url_curriculum' => 'required',
        'jobs_name' => 'required',
        'score' => 'required',
        'url_documents' => 'required',
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
