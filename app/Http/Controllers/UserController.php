<?php

namespace App\Http\Controllers;

use App\Department;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\ResetPasswordRequest;
use Toast;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('department')->get();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = Department::all();

        return view('users.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequest $request)
    {
        $inputs = $request->all();

        $user = User::create($inputs);

        if ($request->hasFile('image')) {
           $this->uploadImage($request->image, $user->id); 
        }

        Toast::success('New user added', 'Success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $departments = Department::all();

        return view('users.update', compact('user', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $inputs = $request->all();

        $user->update($request->all());

        if ($request->hasFile('image')) {
           $this->uploadImage($request->image, $user->id); 
        }

        Toast::success('User updated', 'Success');

        return redirect('dashboard/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        Toast::success('User deleted', 'Success');

        return redirect('dashboard/users');
    }


    /**
     * Upload Image
     *
     * @param Request $request
     * @param image image
     * @return void
     */
    public function uploadImage($image, $id)
    {
        $name = time() . '.' . $image->getClientOriginalName();
        $destinationPath = 'uploads/images';
        $upload = $image->move($destinationPath, $name);
        User::where('id', $id)->update(['image' => $name]);
    }

    public function changePassword($id)
    {        
        $user = User::find($id);

        return view('users.view-change-password', compact('user'));
    }

    public function updatePassword(ResetPasswordRequest $request)
    {        
        $user = User::find($request->id);

        $user->password = bcrypt($request->password);

        $user->save();

        Toast::success('Password Resetted', 'Success');

        return redirect('dashboard/users');
    }
}
