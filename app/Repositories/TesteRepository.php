<?php

namespace App\Repositories;

use App\Models\Teste;
use App\Repositories\BaseRepository;

/**
 * Class TesteRepository
 * @package App\Repositories
 * @version January 16, 2020, 9:50 pm UTC
*/

class TesteRepository extends BaseRepository
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
        return Teste::class;
    }
}
