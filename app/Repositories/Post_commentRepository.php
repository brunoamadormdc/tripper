<?php

namespace App\Repositories;

use App\Models\Post_comment;
use App\Repositories\BaseRepository;

/**
 * Class Post_commentRepository
 * @package App\Repositories
 * @version February 27, 2020, 3:47 pm UTC
*/

class Post_commentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'post_id',
        'user_id',
        'email',
        'name',
        'webpage',
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
        return Post_comment::class;
    }
}
