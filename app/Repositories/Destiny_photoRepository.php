<?php

namespace App\Repositories;

use App\Models\Destiny_photo;
use App\Repositories\BaseRepository;

/**
 * Class Destiny_photoRepository
 * @package App\Repositories
 * @version January 17, 2020, 6:33 pm UTC
*/

class Destiny_photoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'image',
        'destiny_id'
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
        return Destiny_photo::class;
    }
}
