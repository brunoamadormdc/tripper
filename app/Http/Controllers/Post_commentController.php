<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePost_commentRequest;
use App\Http\Requests\UpdatePost_commentRequest;
use App\Repositories\Post_commentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Post_commentController extends AppBaseController
{
    /** @var  Post_commentRepository */
    private $postCommentRepository;

    public function __construct(Post_commentRepository $postCommentRepo)
    {
        $this->postCommentRepository = $postCommentRepo;
        $this->middleware(['auth','hasadminbadge']);
    }

    /**
     * Display a listing of the Post_comment.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $postComments = $this->postCommentRepository->all();

        return view('post_comments.index')
            ->with('postComments', $postComments);
    }

    /**
     * Show the form for creating a new Post_comment.
     *
     * @return Response
     */
    public function create()
    {
        return view('post_comments.create');
    }

    /**
     * Store a newly created Post_comment in storage.
     *
     * @param CreatePost_commentRequest $request
     *
     * @return Response
     */
    public function store(CreatePost_commentRequest $request)
    {
        $input = $request->all();

        $postComment = $this->postCommentRepository->create($input);

        Flash::success('Comentário enviado para aprovação.');

        return redirect()->back();
    }

    /**
     * Display the specified Post_comment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $postComment = $this->postCommentRepository->find($id);

        if (empty($postComment)) {
            Flash::error('Post Comment not found');

            return redirect(route('postComments.index'));
        }

        return view('post_comments.show')->with('postComment', $postComment);
    }

    /**
     * Show the form for editing the specified Post_comment.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $postComment = $this->postCommentRepository->find($id);

        if (empty($postComment)) {
            Flash::error('Post Comment not found');

            return redirect(route('postComments.index'));
        }

        return view('post_comments.edit')->with('postComment', $postComment);
    }

    /**
     * Update the specified Post_comment in storage.
     *
     * @param int $id
     * @param UpdatePost_commentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePost_commentRequest $request)
    {
        $postComment = $this->postCommentRepository->find($id);

        if (empty($postComment)) {
            Flash::error('Post Comment not found');

            return redirect(route('postComments.index'));
        }

        $postComment = $this->postCommentRepository->update($request->all(), $id);

        Flash::success('Post Comment updated successfully.');

        return redirect(route('postComments.index'));
    }

    /**
     * Remove the specified Post_comment from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $postComment = $this->postCommentRepository->find($id);

        if (empty($postComment)) {
            Flash::error('Post Comment not found');

            return redirect(route('postComments.index'));
        }

        $this->postCommentRepository->delete($id);

        Flash::success('Post Comment deleted successfully.');

        return redirect(route('postComments.index'));
    }
}
