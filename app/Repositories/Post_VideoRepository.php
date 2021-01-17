<?php

namespace App\Repositories;

use App\Models\Post_Video;
use App\Repositories\BaseRepository;

/**
 * Class Post_VideoRepository
 * @package App\Repositories
 * @version February 4, 2020, 5:25 pm UTC
*/

class Post_VideoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'video_link',
        'video_id',
        'published',
        'created_by',
        'updated_by',
        'post_id'
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
        return Post_Video::class;
    }
}
