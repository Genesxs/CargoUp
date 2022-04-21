<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class owner extends Model
{
    //type_payment
    const CREDITO = 1;
    const CONTADO = 2;
    //status
    const PENDIENTE = 1;
    const COMPLETADO = 2;
    const APROBADO = 3;
    const DENEGADO = 4;

    use HasFactory;

    public $table = 'owners';


    public $fillable = [
        'url_credit',
        'type_payment',
        'type_account',
        'status',
        'account_number',
        'url_bank_certificate',
        'url_identity',
        'url_photo',
        'url_document_approved',
        'bank_id',
        'type_account_id',
        'profile_id'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'url_credit' => 'string',
        'type_account' => 'integer',
        'type_payment' => 'integer',
        'status' => 'integer',
        'account_number' => 'string',
        'url_bank_certificate' => 'string',
        'url_identity' => 'string',
        'url_photo' => 'string',
        'url_document_approved' => 'string',
        'bank_id' => 'integer',
        'type_account_id' => 'integer',
        'profile_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'type_payment' => 'required',
        'type_account' => 'required',
        'url_credit' => 'required',
        'account_number' => 'required',
        'url_bank_certificate' => 'required',
        'url_identity' => 'required',
        'url_photo' => 'required',
        'url_document_approved' => 'required',
        'type_account_id' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function profile()
    {
        return $this->hasOne(\App\Models\Frontend\Profile::class, 'profile_id', 'id');
    }

    public function Bank()
    {
        return $this->belongsTo(\App\Models\Backend\Bank::class, 'bank_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function typeAccount()
    {
        return $this->belongsTo(\App\Models\Backend\TypeAccount::class, 'type_account_id', 'id');
    }
}
