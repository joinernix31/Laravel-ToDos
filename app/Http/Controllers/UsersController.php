<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\DeleteUsersFormRequest;
use App\Http\Requests\Users\ShowUsersFormRequest;
use App\Http\Requests\Users\StoreUsersFormRequest;
use App\Http\Requests\Users\UpdateUsersFormRequest;
use App\Models\User;
use App\Repositories\UsersRepository;

//Models
//FormRequest
//Repositories
class UsersController extends Controller
{
    //
    public function __construct (UsersRepository $UsersRepository)
    {
        $this->userRepository = $UsersRepository;
    }
    public function index()
    {
        $users = $this->userRepository->all();

        return view('users.index', ['users' => $users]);
    }

    public function store(StoreUsersFormRequest $request)
    {
        $user = new User();
        $user->name = $request->name_user;
        $user->email = $request->email;
        //$user->password = bcrypt($request->password);
        $user->password = $request->password;
        $this->userRepository->create($user);
        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario agregado correctamente');
    }

    public function show(ShowUsersFormRequest $request, $id)
    {
        $user = $this->userRepository->show($id);
        if(!$user){
           return redirect()->route('users.index')->with('error', 'El Usuario no existe');
        }


        return view('users.show', ['user' => $user, 'users' => $user]);
    }

    public function update(UpdateUsersFormRequest $request,$id)
    {
        $user = $this->userRepository->update($id);

        $user -> name = $request->name_user;
        $user -> email = $request->email;
        $user-> password = $request->password;
        //$user -> password = bcrypt($request->password);

        $user->save();
        return redirect()->route('users.index')->with('success', 'Usuario Actualizado Correctamente');
    }

    public function create()
    {
        return view('users.create');
    }

    public function destroy(DeleteUsersFormRequest $request, $id)
    {
        $user = $this->userRepository->delete($id);
        $user -> delete();

        return redirect()->route('users.index')->with('success', 'Usuario Eliminado Correctamente');
    }

}
