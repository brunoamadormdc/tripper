<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePost_DetailRequest;
use App\Http\Requests\UpdatePost_DetailRequest;
use App\Repositories\Post_DetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class Post_DetailController extends AppBaseController
{
    /** @var  Post_DetailRepository */
    private $postDetailRepository;

    public function __construct(Post_DetailRepository $postDetailRepo)
    {
        $this->postDetailRepository = $postDetailRepo;
        $this->middleware(['auth','hasadminbadge']);
    }

    /**
     * Display a listing of the Post_Detail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $postDetails = $this->postDetailRepository->all();

        return view('post__details.index')
            ->with('postDetails', $postDetails);
    }

    /**
     * Show the form for creating a new Post_Detail.
     *
     * @return Response
     */
    public function create()
    {
        return view('post__details.create');
    }

    /**
     * Store a newly created Post_Detail in storage.
     *
     * @param CreatePost_DetailRequest $request
     *
     * @return Response
     */
    public function store(CreatePost_DetailRequest $request)
    {
        $input = $request->all();
        $input['created_by'] = \Auth::user()->id;

        $postDetail = $this->postDetailRepository->create($input);

        Flash::success('Detalhes do post salvos com sucesso');

        //return redirect(route('postDetails.index'));
        return redirect(route('posts.show', $input['post_id']));
    }

    /**
     * Display the specified Post_Detail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $postDetail = $this->postDetailRepository->find($id);

        if (empty($postDetail)) {
            Flash::error('Detalhes do post nao encontrado');

            return redirect(route('postDetails.index'));
        }

        return view('post__details.show')->with('postDetail', $postDetail);
    }

    /**
     * Show the form for editing the specified Post_Detail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $postDetail = $this->postDetailRepository->find($id);

        if (empty($postDetail)) {
            Flash::error('Detalhes do post nao encontrado');

            return redirect(route('postDetails.index'));
        }

        return view('post__details.edit')->with('postDetail', $postDetail);
    }

    /**
     * Update the specified Post_Detail in storage.
     *
     * @param int $id
     * @param UpdatePost_DetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePost_DetailRequest $request)
    {
        $postDetail = $this->postDetailRepository->find($id);

        if (empty($postDetail)) {
            Flash::error('Detalhes do post nao encontrado');

            return redirect(route('postDetails.index'));
        }

        $postDetail = $this->postDetailRepository->update($request->all(), $id);

        Flash::success('Detalhes do post alterados com sucesso.');

        return redirect(route('postDetails.index'));
    }

    /**
     * Remove the specified Post_Detail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $postDetail = $this->postDetailRepository->find($id);

        if (empty($postDetail)) {
            Flash::error('Detalhes do post nao encontrado');

            return redirect(route('postDetails.index'));
        }

        $this->postDetailRepository->delete($id);

        Flash::success('Detalhes do post exclu[ido com sucesso.');

        return redirect(route('postDetails.index'));
    }
}
