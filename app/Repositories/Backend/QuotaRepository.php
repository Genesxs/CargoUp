<?php

namespace App\Repositories\Backend;

use App\Models\Backend\Quota;
use App\Repositories\BaseRepository;

/**
 * Class QuotaRepository
 * @package App\Repositories\Backend
 * @version February 18, 2022, 4:14 pm UTC
*/

class QuotaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'months_number ',
        'price',
        'type_vehicle_id'
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
        return Quota::class;
    }
}
