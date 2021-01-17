<?php

namespace App\Repositories;

use App\Models\Tip;
use App\Repositories\BaseRepository;

/**
 * Class TipRepository
 * @package App\Repositories
 * @version January 20, 2020, 1:50 pm UTC
*/

class TipRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'body',
        'image'
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
        return Tip::class;
    }
}
