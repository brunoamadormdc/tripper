<?php

namespace App\Repositories;

use App\Models\First_home_banner;
use App\Repositories\BaseRepository;

/**
 * Class First_home_bannerRepository
 * @package App\Repositories
 * @version January 21, 2020, 6:19 pm UTC
*/

class First_home_bannerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'image',
        'body',
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
        return First_home_banner::class;
    }
}
