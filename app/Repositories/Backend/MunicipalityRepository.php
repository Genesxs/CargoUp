<?php

namespace App\Repositories\Backend;

use App\Models\Backend\Municipality;
use App\Repositories\BaseRepository;

/**
 * Class MunicipalityRepository
 * @package App\Repositories\Backend
 * @version December 3, 2021, 6:47 pm UTC
*/

class MunicipalityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'code',
        'complete_code',
        'department_id'
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
        return Municipality::class;
    }
}
