<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePost_commentRequest;
use App\Http\Requests\UpdatePost_commentRequest;
use App\Repositories\Post_commentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class GuestsController extends AppBaseController
{
    /** @var  Post_commentRepository */
    private $postCommentRepository;

    public function __construct(Post_commentRepository $postCommentRepo)
    {
        $this->postCommentRepository = $postCommentRepo;
        $this->middleware(['guest']);
    }

   
    /**
     * Store a newly created Post_comment in storage.
     *
     * @param CreatePost_commentRequest $request
     *
     * @return Response
     */
    public function storeComment(CreatePost_commentRequest $request)
    {
        $input = $request->all();

        $postComment = $this->postCommentRepository->create($input);

        Flash::success('Comentário enviado para aprovação.');

        return redirect()->back();
    }

   
}
