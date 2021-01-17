<?php

namespace App\Repositories;

use App\Models\Post_Photo;
use App\Repositories\BaseRepository;

/**
 * Class Post_PhotoRepository
 * @package App\Repositories
 * @version February 4, 2020, 2:39 pm UTC
*/

class Post_PhotoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'image',
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
        return Post_Photo::class;
    }
}
