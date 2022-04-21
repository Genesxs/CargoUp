<?php

namespace App\Repositories\Backend;

use App\Models\Backend\DocumentType;
use App\Repositories\BaseRepository;

/**
 * Class DocumentTypeRepository
 * @package App\Repositories\Backend
 * @version December 3, 2021, 6:44 pm UTC
*/

class DocumentTypeRepository extends BaseRepository
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
        return DocumentType::class;
    }
}
