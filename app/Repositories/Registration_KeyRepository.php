<?php

namespace App\Repositories;

use App\Models\Registration_Key;
use App\Repositories\BaseRepository;

/**
 * Class Registration_KeyRepository
 * @package App\Repositories
 * @version January 22, 2020, 8:22 pm UTC
*/

class Registration_KeyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'key',
        'status'
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
        return Registration_Key::class;
    }
}
