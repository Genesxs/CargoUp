<?php

namespace App\Repositories\Backend;

use App\Models\Backend\Gender;
use App\Repositories\BaseRepository;

/**
 * Class GenderRepository
 * @package App\Repositories\Backend
 * @version December 3, 2021, 6:46 pm UTC
*/

class GenderRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name'
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
        return Gender::class;
    }
}
