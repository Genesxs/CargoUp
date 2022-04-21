<?php

namespace App\Repositories\Backend;

use App\Models\Backend\Vehicle;
use App\Repositories\BaseRepository;

/**
 * Class VehicleRepository
 * @package App\Repositories\Backend
 * @version March 8, 2022, 3:54 pm UTC
*/

class VehicleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'badge',
        'capacity',
        'owner_id',
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
        return Vehicle::class;
    }
}
