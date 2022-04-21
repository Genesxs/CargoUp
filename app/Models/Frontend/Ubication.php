<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubication extends Model
{
    use HasFactory;

    public $table = 'ubications';
    
    
        public $fillable = [
            'name'
        ];
    
        /**
         * The attributes that should be casted to native types.
         *
         * @var array
         */
        protected $casts = [
            'id' => 'integer',
            'name' => 'string'
        ];
    
        /**
         * Validation rules
         *
         * @var array
         */
        public static $rules = [
            'name' => 'required'
        ];
}
