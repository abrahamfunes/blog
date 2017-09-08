<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\Redirect;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;

class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
        #$this->middleware('AdminCountry');
        #$this->middleware('AdminGeneral');
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
//        if(!\Auth::user()->hasAnyRole(['admin.general','admin.country']))
//            return redirect()->to('home');

        $this->userRepository->pushCriteria(new RequestCriteria($request));
        #dd(User::join("users_roles", "users.id", "users_roles.user_id")->get());
        if(Auth::user()->hasRole('admin.general'))
            $users = User::join("users_roles", "users.id", "users_roles.user_id")->where(array(["status_id", ">=", 1]))->get();
        else
            $users = User::join("users_roles", "users.id", "users_roles.user_id")->where(array(["status_id", ">=", 1], ["role_id", ">", 1]))->get();


        #dd($users[0]->roles()->where('user_id', $users[0]->id)->first());
#dd($users);

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

        $input['password'] = bcrypt($input['password']);

        $user = $this->userRepository->create($input);

        $role = Role::find($input['profile_id']);

        $user->roles()->attach($role);

        Flash::success('Registro ingresado correctamente.');

        return redirect(route('users.index'));
    }

    /**
     * Display the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('Registro NO encontrado');

            return redirect(route('users.index'));
        }

        return view('users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('Registro NO encontrado');

            return redirect(route('users.index'));
        }

        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param  int              $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update(User $user, UpdateUserRequest $request)
    {
        $id = $user->id;

        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('Registro NO encontrado');

            return redirect(route('users.index'));
        }

        if($request['password'] != ''){
            $request['password'] = bcrypt($request['password']);
        }else{
            $request['password'] = $user->password;
        }

        $user = $this->userRepository->update($request->all(), $id);

        $user->roles()->detach(Role::all());

        $role = Role::find($request['profile_id']);

        $user->roles()->attach($role);

        Flash::success('Registro actualizado correctamente.');

        return redirect(route('users.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->findWithoutFail($id);

        if (empty($user)) {
            Flash::error('Registro NO encontrado');

            return redirect(route('users.index'));
        }

        $user->status_id = 0;
        $user->email = $user->email."-eliminado-".$user->id;
        $user->save();
        //$this->userRepository->delete($id);

        Flash::success('Registro eliminado correctamente.');

        return redirect(route('users.index'));
    }
}
