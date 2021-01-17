<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Repositories\PostRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use App\Models\Post;
use Flash;
use Response;
use App\Models\Category;
//Storage
use Illuminate\Support\Facades\Storage;

class PostController extends AppBaseController
{
    /** @var  PostRepository */
    private $postRepository;

    public function __construct(PostRepository $postRepo)
    {
        $this->postRepository = $postRepo;
        $this->middleware(['auth','hasadminbadge']);
    }

    /**
     * Display a listing of the Post.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {

        if(isset($request->tag)){
            $posts = Post::withAnyTag([$request->tag])->orderByDesc('created_at')->paginate(10);
        }else{
            $posts = Post::orderByDesc('created_at')->paginate(10);
        }
        

        return view('posts.index')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new Post.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::where('avaliable', 1)->get();
        return view('posts.create')->with('categories', $categories);
    }

    /**
     * Store a newly created Post in storage.
     *
     * @param CreatePostRequest $request
     *
     * @return Response
     */
    public function store(CreatePostRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = \Auth::user()->id;
        $tags = explode(',', $input['tags']);
        unset($input['tags']);
        
        $post = $this->postRepository->create($input);

        if($request->file('main_image')){
            $path = Storage::disk('public')->put('post-images', $request->file('main_image'));
            $post->fill(['main_image' => asset($path)])->save();
        }

        if($request->file('secondary_image')){
            $path = Storage::disk('public')->put('post-images', $request->file('secondary_image'));
            $post->fill(['secondary_image' => asset($path)])->save();
        }

        $post->tag($tags);

        Flash::success('Publicação salva com sucesso.');

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified Post.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $post = $this->postRepository->find($id);

        if (empty($post)) {
            Flash::error('Publicação não encontrada.');

            return redirect(route('posts.index'));
        }

        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified Post.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $post = $this->postRepository->find($id);
        $tags = '';
        if(!empty($post->tags)){            
            foreach($post->tags as $tag){
                $tags .= $tag->name . ",";
            }
        }

        if (empty($post)) {
            Flash::error('Publicação não encontrada.');

            return redirect(route('posts.index'));
        }

        $categories = Category::where('avaliable', 1)->get();        
        return view('posts.edit')->with('post', $post)->with(['categories' => $categories, 'tags' => $tags]);
    }

    /**
     * Update the specified Post in storage.
     *
     * @param int $id
     * @param UpdatePostRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePostRequest $request)
    {
        $post = $this->postRepository->find($id);
        $input = $request->all();
        $tags = explode(',', $input['tags']);
        unset($input['tags']);
        
        if(!isset($input['published'])){
          $input['published'] = false;  
        }

        if (empty($post)) {
            Flash::error('Publicação não encontrada.');

            return redirect(route('posts.index'));
        }

        if($request->file('main_image')){
            if($post->main_image){
                $url = explode('/', $post->main_image);                
                $delete_file = $url['3'].'/'.$url['4'];                          
                Storage::disk('public')->delete($delete_file);
            }           
        }

        if($request->file('secondary_image')){
            if($post->secondary_image){
                $url = explode('/', $post->secondary_image);
                $delete_file = $url['3'].'/'.$url['4'];                          
                Storage::disk('public')->delete($delete_file);
            }
        }

        $post = $this->postRepository->update($input, $id);

        if($request->file('main_image')){
            $path = Storage::disk('public')->put('post-images', $request->file('main_image'));
            $post->fill(['main_image' => asset($path)])->save();
        }
        

        if($request->file('secondary_image')){            
            $path = Storage::disk('public')->put('post-images', $request->file('secondary_image'));
            $post->fill(['secondary_image' => asset($path)])->save();
        }

        $post->retag($tags);

        Flash::success('Publicação alterada com sucesso.');

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified Post from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $post = $this->postRepository->find($id);

        if (empty($post)) {
            Flash::error('Publicação não encontrada.');

            return redirect(route('posts.index'));
        }

        foreach($post->photos as $photo){
            $photo->delete();
        }

        foreach($post->details as $detail){
            $detail->delete();
        }

        foreach($post->videos as $video){
            $video->delete();
        }

        $post->untag();

        $this->postRepository->delete($id);

        Flash::success('Publicação excluída com sucesso');

        return redirect(route('posts.index'));
    }
}
