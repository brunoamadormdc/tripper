<?php

namespace App\Repositories;

use App\Models\Testando;
use App\Repositories\BaseRepository;

/**
 * Class TestandoRepository
 * @package App\Repositories
 * @version January 31, 2020, 4:17 pm UTC
*/

class TestandoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'body'
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
        return Testando::class;
    }
}
