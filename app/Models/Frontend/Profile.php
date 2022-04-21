<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    public $fillable = [
        'identification_number',
        'cellphone',
        'telephone',
        'address',
        'document_type_id',
        'municipality_id',
        'gender_id',
        'user_id'      
    ];

    protected $casts = [
        'id' => 'integer',
        'identification_number' => 'string',
        'cellphone' => 'string',
        'telephone' => 'string',
        'address' => 'string',
        'document_type_id' => 'integer',
        'municipality' => 'integer',
        'gender_id' => 'integer',
        'user_id' => 'integer'
    ];



    public function documentType()
    {
        return $this->belongsTo('App\Models\Backend\DocumentType', 'document_type_id', 'id');
    }

    public function gender()
    {
        return $this->belongsTo('App\Models\Backend\Gender', 'gender_id', 'id');
    }

     // Relación Many to One:
     public function municipality()
     {
         return $this->belongsTo('App\Models\Backend\Municipality', 'municipality_id', 'id');
     }
 
    // Relación One to One:
    public function user()
    {
        return $this->belongsTo('App\Domains\Auth\Models\User', 'user_id');
    }

   
   
}
