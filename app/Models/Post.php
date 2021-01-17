<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Conner\Tagging\Taggable;

/**
 * Class Post
 * @package App\Models
 * @version February 4, 2020, 2:12 pm UTC
 *
 * @property string title
 * @property string subtitle
 * @property string summary
 * @property string body
 * @property string price
 * @property string booking_link
 * @property string booking_link_text
 * @property string external_link
 * @property string font_text
 * @property string font_link
 * @property string main_image
 * @property string secondary_image
 * @property string page
 * @property integer category_id
 * @property boolean published
 * @property integer created_by
 * @property integer updated_by
 */
class Post extends Model
{
    use SoftDeletes;
    use Taggable;

    public $table = 'posts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'subtitle',
        'summary',
        'body',
        'underbody',
        'price',
        'booking_link',
        'booking_link_text',
        'external_link',
        'font_text',
        'font_link',
        'main_image',
        'secondary_image',
        'page',
        'category_id',
        'published',
        'viewtitle',
        'iconcolor',
        'iframe1',
        'iframe2',
        'iframe3',
        'iframe4',
        'iframe5',
        'created_by',
        'updated_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'iframe1' => 'string',
        'iframe2' => 'string',
        'iframe3' => 'string',
        'iframe4' => 'string',
        'iframe5' => 'string',
        'subtitle' => 'string',
        'price' => 'string',
        'booking_link' => 'string',
        'booking_link_text' => 'string',
        'external_link' => 'string',
        'font_text' => 'string',
        'font_link' => 'string',
        'main_image' => 'string',
        'secondary_image' => 'string',
        'page' => 'string',
        'category_id' => 'integer',
        'published' => 'boolean',
        'viewtitle' => 'boolean',
        'iconcolor' => 'string',
        'created_by' => 'integer',
        'updated_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function photos()
    {
        return $this->hasMany('App\Models\Post_Photo');
    }

    public function details()
    {
        return $this->hasMany('App\Models\Post_Detail');
    }

    public function videos()
    {
        return $this->hasMany('App\Models\Post_Video');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Post_comment');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function tags()
    {
        return $this->belongsTo('App\Models\tagging_tagged');
    }

    public function owner()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo('App\Models\User', 'updated_by');
    }


    public static function getPostsfrombenefits() {
        
        $posts = Post::where('published', 1)->inRandomOrder()->get();

        return $posts;
    } public static function getPostsfrombenefits2() {
        
        $posts = Post::where('published', 1)->inRandomOrder()->take(3)->get();

        return $posts;
    }
    public static function getPostsfrompassagens() {
        
        $posts = Post::where('published', 1)->inRandomOrder()->get();

        return $posts;
    }

    public static function getRandomCategoryPostsHome()
    {
        $homeCategories = array(
            'Vantagens',
            'Pacotes',
            'Hoteis'
        );

        $randomKey = array_rand($homeCategories);

        $category = $homeCategories[$randomKey];

        $posts = Post::where('published', 1)->whereHas('category', function($query) use ($category){
            $query->where('name', $category);
        })->get()->chunk(2);

        return $posts;
       
    }
    
    public static function getOneRandom() {
        $category = 'Pacotes';
        $posts = Post::where('published', 1)->whereHas('category', function($query) use ($category){
            $query->where('name', $category);
        })->inRandomOrder()->first();

        return $posts;
    }

    public static function getRandomCategoryPosts($tags)
    {
        $homeCategories = Category::all()->pluck('name')->toArray();

        $randomKey = array_rand($homeCategories);

        $category = $homeCategories[$randomKey];

        $posts = Post::withAnyTag($tags)->where('published', 1)->whereHas('category', function($query) use ($category){
            $query->where('name', $category);
        })->get()->chunk(2);

        return $posts;
       
    }

    public static function getTwoRandomCategoryPosts()
    {
        $category_1 = Category::inRandomOrder()->first();
        $category_2 = Category::where('name', '!=', $category_1->name)->inRandomOrder()->first();
        
        return array($category_1, $category_2);
        
    }

    public function postColor()
    {
        
        switch ($this->category->name) {
            case 'Dicas':
                $color = '#892b2b';
                break;
            case 'Hoteis':
                $color = '#0daf96';
                break;
            case 'Pacotes':
                $color = '#bff51c';
                break;
            case 'Destinos':
                $color = '#3750ba';
                break;            
            default:
                $color = '#3d3535';
                break;
        }

        return $color;
    }

    
}
