<?php

namespace App\Repositories;

use App\Models\Post_Detail;
use App\Repositories\BaseRepository;

/**
 * Class Post_DetailRepository
 * @package App\Repositories
 * @version February 4, 2020, 2:51 pm UTC
*/

class Post_DetailRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'body',
        'post_id',
        'published',
        'created_by',
        'updated_by'
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
        return Post_Detail::class;
    }
}
