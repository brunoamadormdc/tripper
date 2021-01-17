<?php

namespace App\Repositories;

use App\Models\Destiny;
use App\Repositories\BaseRepository;

/**
 * Class DestinyRepository
 * @package App\Repositories
 * @version January 17, 2020, 2:57 pm UTC
*/

class DestinyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'body',
        'main_image',
        'secondary_image',
        'published'
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
        return Destiny::class;
    }
}
