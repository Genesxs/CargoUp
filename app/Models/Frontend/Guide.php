<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guide extends Model
{
    use HasFactory;

    //status
    const PENDIENTE = 1;
    const PAGADA = 2;
    const ANULADO = 3;
    const ENTREGADA = 4;

    public $table = 'guides';


    public $fillable = [
        'date_guide',
        'date_pick',
        'pick_place_id',
        'payment_guide',
        'guide_detail_id',
        'status',
        'subtotal',
        'total'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'date_guide' => 'date',
        'date_pick' => 'date',
        'pick_place_id' => 'integer',
        'payment_guide' => 'string',
        'guide_detail_id' => 'integer',
        'iva_id' => 'integer',
        'discount_id' => 'integer',
        'status' => 'integer',
        'subtotal' => 'integer',
        'total' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'date_guide' => 'required',
        'date_pick' => 'required',
        'pick_place_id' => 'required',
        'guide_detail_id' => 'required',
        'status' => 'required',
        'subtotal' => 'required',
        'total' => 'required'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function pickPlace()
    {
        return $this->belongsTo(\App\Models\Frontend\PickPlace::class, 'pick_place_id', 'id');
    }

    public function guideDetail()
    {
        return $this->belongsTo(\App\Models\Frontend\GuideDetail::class, 'guide_detail_id', 'id');
    }

    public function discount()
    {
        return $this->belongsTo(\App\Models\Backend\Discount::class, 'discount_id', 'id');
    }

    public function iva()
    {
        return $this->belongsTo(\App\Models\Backend\Iva::class, 'iva_id', 'id');
    }
}
