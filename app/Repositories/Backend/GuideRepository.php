<?php

namespace App\Repositories\Backend;

use App\Models\Frontend\Guide;
use App\Repositories\BaseRepository;

/**
 * Class GuideRepository
 * @package App\Repositories\Backend
 * @version February 18, 2022, 4:11 pm UTC
*/

class GuideRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Guide::class;
    }
}
