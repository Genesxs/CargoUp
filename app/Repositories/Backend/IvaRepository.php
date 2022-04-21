<?php

namespace App\Repositories\Backend;

use App\Models\Backend\Iva;
use App\Repositories\BaseRepository;

/**
 * Class IvaRepository
 * @package App\Repositories\Backend
 * @version December 3, 2021, 6:49 pm UTC
*/

class IvaRepository extends BaseRepository
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
        return Iva::class;
    }
}
