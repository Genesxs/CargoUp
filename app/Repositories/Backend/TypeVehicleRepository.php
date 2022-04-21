<?php

namespace App\Repositories\Backend;

use App\Models\Backend\TypeVehicle;
use App\Repositories\BaseRepository;

/**
 * Class TypeVehicleRepository
 * @package App\Repositories\Backend
 * @version February 18, 2022, 4:13 pm UTC
*/

class TypeVehicleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'name',
        'url_photo',
        'price'
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
        return TypeVehicle::class;
    }
}
