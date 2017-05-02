<?php

namespace Blog\Http\Controllers;

use Blog\Http\Requests\UserRole\Create;
use Blog\Http\Requests\UserRole\Edit;
use Blog\Http\Requests\UserRole\Index;
use Blog\Http\Requests\UserRole\Show;
use Blog\Http\Requests\UserRole\Store;
use Blog\Http\Requests\UserRole\Update;
use Illuminate\Http\Request;

use Auth;
use Blog\User;
use Blog\Role;
use Blog\UserRole;
class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        $UserRoles = UserRole::paginate(10);
        return view('UserRoles.index')->with('data', $UserRoles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Create $request)
    {
        $user = User::get();
        $role = Role::all();
        return view('userRoles.create')->with('user', $user)->with('role', $role);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $UserRole = new UserRole;
        $UserRole->fill($request->all());

        if ($UserRole->save()) {
            return redirect()->back()->with('response_message', 'UserRole created successfully')->with('result', 'alert-success');
        } else {
            return redirect()->back()->with('response_message', 'Something went wrong. Please try again')->with('result', 'alert-danger');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Show $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Edit $request, UserRole $UserRole)
    {
        $user = User::get();
        $role = Role::all();
        return view('userRoles.edit')->with('data', $UserRole);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, UserRole $UserRole)
    {
        // $this->authorize('update', $UserRole);
        $UserRole->fill($request->all());

        if ($UserRole->save()) {
            return redirect()->back()->with('response_message', 'Your data updated succesfully')->with('result', 'alert-success');
        } else {
            return redirect()->back()->with('response_message', 'Not updated')->with('result', 'alert-danger');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRole $UserRole)
    {
        // $this->authorize('delete', $UserRole);
        if ($UserRole->delete()) {
            return redirect()->back()->with('response_message', 'Deleted successfully')->with('result', 'alert-danger');
        } else {
            return redirect()->back()->with('response_message', 'Not Deleted')->with('result', 'alert-danger');
        }
    }
}
