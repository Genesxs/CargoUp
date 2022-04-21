<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuideDetail extends Model
{
    use HasFactory;

    //type_send
    const PAQUETE = 1;
    const SOBRE = 2;

    public $table = 'guide_details';


    public $fillable = [
        'guide_id',
        'type_send',
        'cuantity',
        'description',
        'content',
        'height',
        'width',
        'length',
        'weight',
        'price'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'guide_id' => 'integer',
        'type_send' => 'integer',
        'cuantity' => 'integer',
        'content' => 'string',
        'height' => 'integer',
        'width' => 'integer',
        'length' => 'integer',
        'weight' => 'integer',
        'price' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'guide_id' => 'required',
        'type_send' => 'required',
        'cuantity' => 'required',
        'content' => 'required',
        'weight' => 'required',
        'price' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function guide()
    {
        return $this->belongsTo(\App\Models\Frontend\Guide::class, 'guide_id', 'id');
    }
}
