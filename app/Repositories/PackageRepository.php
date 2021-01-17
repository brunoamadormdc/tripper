<?php

namespace App\Repositories;

use App\Models\Package;
use App\Repositories\BaseRepository;

/**
 * Class PackageRepository
 * @package App\Repositories
 * @version January 20, 2020, 7:13 pm UTC
*/

class PackageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'subtitle',
        'body',
        'main_image',
        'price',
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
        return Package::class;
    }
}
