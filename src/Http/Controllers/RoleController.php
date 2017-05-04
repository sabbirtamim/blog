<?php

namespace Blog\Http\Controllers;

use Blog\Http\Requests\Role\Create;
use Blog\Http\Requests\Role\Edit;
use Blog\Http\Requests\Role\Index;
use Blog\Http\Requests\Role\Show;
use Blog\Http\Requests\Role\Store;
use Blog\Http\Requests\Role\Update;
use Illuminate\Http\Request;

use Auth;
use Blog\Role;
use Blog\UserRole;
class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Index $request)
    {
        $roles = Role::paginate(10);
        return view('blog.roles.index')->with('data', $roles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $term = Term::all();
        return view('blog.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Store $request)
    {
        $Role = new Role;
        $Role->fill($request->all());

        if ($Role->save()) {
            return redirect()->back()->with('response_message', 'Role created successfully')->with('result', 'alert-success');
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
    public function edit(Edit $request, Role $role)
    {
        return view('blog.roles.edit')->with('data', $role);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Update $request, Role $role)
    {
        // $this->authorize('update', $role);
        $role->fill($request->all());

        if ($role->save()) {
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
    public function destroy(Role $role)
    {
        // $this->authorize('delete', $role);
        if ($role->userRole->delete() && $role->delete()) {
            return redirect()->back()->with('response_message', 'Deleted successfully')->with('result', 'alert-danger');
        } else {
            return redirect()->back()->with('response_message', 'Not Deleted')->with('result', 'alert-danger');
        }
    }
}
