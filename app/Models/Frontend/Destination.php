<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

        public $table = 'destinations';
    
    
        public $fillable = [
            'names',
            'last_names',
            'cellphone',
            'telephone',
            'address',
            'aditional_info',
            'municipality_id'
        ];
    
        /**
         * The attributes that should be casted to native types.
         *
         * @var array
         */
        protected $casts = [
            'id' => 'integer',
            'names' => 'string',
            'last_names' => 'string',
            'cellphone' => 'string',
            'telephone' => 'string',
            'aditional_info' => 'string',
            'address' => 'string',
            'municipality_id' => 'integer'
        ];
    
        /**
         * Validation rules
         *
         * @var array
         */
        public static $rules = [
            'names' => 'required',
            'last_names' => 'required',
            'address' => 'required',
            'municipality_id' => 'required'
        ];
    
        /**
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         **/
        public function municipality()
        {
            return $this->belongsTo(\App\Models\Backend\Municipality::class, 'municipality_id', 'id');
        }
}
