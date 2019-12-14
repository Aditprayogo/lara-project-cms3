<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {

		$userCount = User::count();

        return view('pages.admin.users.index', ['users' => $model->paginate(15)])->with('userCount', $userCount);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('pages.admin.users.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
		// $model->create( $request->merge( ['password' => Hash::make($request->get('password'))] )->all());
		
		$new_user = new User();
		$new_user->name = $request->input('name');
		$new_user->password = bcrypt($request->input('name'));
		$new_user->email = $request->input('email');
		$new_user->roles = $request->input('roles');
		$new_user->avatar = $request->file('avatar')->store('assets/avatar', 'public');

		$new_user->save();

        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('pages.admin.users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
    {

		$input = $request->all();

		$hashedpassword = $user->password;
		
		if ($input['password'] == '') {
			# code...
			$input['password'] = $hashedpassword;

		} else {

			$input['password'] = Hash::make($request->input('password'));

		}

		if ($request->file('avatar')) {

			# code...
			$input['avatar'] = $request->file('avatar')->store('assets/avatar', 'public');

		}

		$user->update($input);


        // $user->update(
		// 	$request->merge(['password' => Hash::make($request->get('password'))], ['avatar' => $new_image])
        //         ->except([$request->get('password') ? '' : 'password']
        // ));

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
	}
	
	
}
