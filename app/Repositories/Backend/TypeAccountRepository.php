<?php

namespace App\Repositories\Backend;

use App\Models\Backend\TypeAccount;
use App\Repositories\BaseRepository;

/**
 * Class TypeAccountRepository
 * @package App\Repositories\Backend
 * @version March 9, 2022, 7:38 pm UTC
*/

class TypeAccountRepository extends BaseRepository
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
        return TypeAccount::class;
    }
}
