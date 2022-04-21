<?php

namespace App\Repositories\Backend;

use App\Models\Backend\Discount;
use App\Repositories\BaseRepository;

/**
 * Class DiscountRepository
 * @package App\Repositories\Backend
 * @version December 3, 2021, 6:49 pm UTC
*/

class DiscountRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'percentage',
        'start_date',
        'end_date'
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
        return Discount::class;
    }
}
