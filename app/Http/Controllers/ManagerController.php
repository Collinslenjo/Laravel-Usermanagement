<?php

namespace App\Http\Controllers;

use Hash;
use App\User;
use App\Http\Requests\ManagerRequest;
use Illuminate\Http\Request;

class ManagerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('managers.index', compact('users'));
       }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('managers.create');  
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManagerRequest $request)
    {
        $request->merge(['password' => Hash::make($request->password)]);
        User::create($request->all());
        return redirect()->route('manager.index')->with('message', 'User has been added successfully.');    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('managers.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        //return view('managers.edit', compact('user'));
        $user =User::findOrFail($user);
        return view('managers.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManagerRequest $request, $user)
    {
        //return redirect()->route('manager.index')->with('message', 'User has been updated successfully.');
        //
        $user = User::findOrFail($user);
        if (trim($request->password) == '') {
            $input = $request->except('password');
            } else {
            $input = $request->all();
        }
        $input['password'] = bcrypt($request->password);
        $user->update($input);
        return redirect()->route('manager.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
         
        $user = User::findOrFail($user);
        $user -> delete();
        return redirect()->route('manager.index')->with('message','User has been deleted successfully');;
        
    }
}
