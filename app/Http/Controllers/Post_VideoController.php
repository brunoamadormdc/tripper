<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePost_VideoRequest;
use App\Http\Requests\UpdatePost_VideoRequest;
use App\Repositories\Post_VideoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Post_VideoController extends AppBaseController
{
    /** @var  Post_VideoRepository */
    private $postVideoRepository;

    public function __construct(Post_VideoRepository $postVideoRepo)
    {
        $this->postVideoRepository = $postVideoRepo;
        $this->middleware(['auth','hasadminbadge']);
    }

    /**
     * Display a listing of the Post_Video.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $postVideos = $this->postVideoRepository->all();

        return view('post__videos.index')
            ->with('postVideos', $postVideos);
    }

    /**
     * Show the form for creating a new Post_Video.
     *
     * @return Response
     */
    public function create()
    {
        return view('post__videos.create');
    }

    /**
     * Store a newly created Post_Video in storage.
     *
     * @param CreatePost_VideoRequest $request
     *
     * @return Response
     */
    public function store(CreatePost_VideoRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = \Auth::user()->id;
        $input['video_id'] = str_replace('https://www.youtube.com/watch?v=', '', $input['video_link']);

        $postVideo = $this->postVideoRepository->create($input);

        Flash::success('Post  Video saved successfully.');

        //return redirect(route('postVideos.index'));
        return redirect(route('posts.show', $input['post_id']));
    }

    /**
     * Display the specified Post_Video.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $postVideo = $this->postVideoRepository->find($id);

        if (empty($postVideo)) {
            Flash::error('Post  Video not found');

            return redirect(route('postVideos.index'));
        }

        return view('post__videos.show')->with('postVideo', $postVideo);
    }

    /**
     * Show the form for editing the specified Post_Video.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $postVideo = $this->postVideoRepository->find($id);

        if (empty($postVideo)) {
            Flash::error('Post  Video not found');

            return redirect(route('postVideos.index'));
        }

        return view('post__videos.edit')->with('postVideo', $postVideo);
    }

    /**
     * Update the specified Post_Video in storage.
     *
     * @param int $id
     * @param UpdatePost_VideoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePost_VideoRequest $request)
    {
        $postVideo = $this->postVideoRepository->find($id);

        if (empty($postVideo)) {
            Flash::error('Post  Video not found');

            return redirect(route('postVideos.index'));
        }

        $postVideo = $this->postVideoRepository->update($request->all(), $id);

        Flash::success('Post  Video updated successfully.');

        return redirect(route('postVideos.index'));
    }

    /**
     * Remove the specified Post_Video from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $postVideo = $this->postVideoRepository->find($id);

        if (empty($postVideo)) {
            Flash::error('Post  Video not found');

            return redirect(route('postVideos.index'));
        }

        $this->postVideoRepository->delete($id);

        Flash::success('Post  Video deleted successfully.');

        return redirect(route('postVideos.index'));
    }
}
