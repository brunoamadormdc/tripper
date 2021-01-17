<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

//Storage
use Illuminate\Support\Facades\Storage;

//Hash
use Illuminate\Support\Facades\Hash;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        $this->middleware(['auth','hasadminbadge','hasadminsuper']);
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->paginate(10);

        return view('users.index')
            ->with('users', $users);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = $this->userRepository->create($input);

        if($request->file('image')){
            $path = Storage::disk('public')->put('profile-images', $request->file('image'));
            $user->fill(['image' => asset($path)])->save();
        }

        Flash::success('Usuário salvo com sucesso.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('Usuário não encontrado.');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('Usuário não encontrado.');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
      
        $user = $this->userRepository->find($id);
        

        if (empty($user)) {
            Flash::error('Usuário não encontrado.');

            return redirect(route('users.index'));
        }

        $input = $request->all();
        if($input['newpassword']){
            $input['password'] = $input['newpassword'];
        }
        if($input['password'] != $user->password){
            $input['password'] = Hash::make($input['password']);
        }

        $user = $this->userRepository->update($input, $id);
        if($request->file('image')){
            $path = Storage::disk('public')->put('profile-images', $request->file('image'));            
            $user->fill(['image' => asset($path)])->save();
        }

        Flash::success('Usuário alterado com sucesso.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->find($id);

        if (empty($user)) {
            Flash::error('Usuário não encontrado.');

            return redirect(route('users.index'));
        }

        $this->userRepository->delete($id);

        Flash::success('Usuário excluído com sucesso.');

        return redirect(route('users.index'));
    }
}
