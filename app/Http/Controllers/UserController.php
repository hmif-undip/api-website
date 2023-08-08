<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['users'] = User::latest()->get();

        return view('users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'email'=>'required|unique:users,email,NULL,id,deleted_at,NULL|email:rfc,filter',
            'name'=>'required',
            'username'=>'required|without_spaces|unique:users,username,NULL,id,deleted_at,NULL',
            'password'=>'required|without_spaces|min:8',
        ]);

        $data = $request->except('_method', '_token');

        if($request->get('password') != ''){
            $data['password'] = bcrypt($request->get('password'));
        }

        $user = User::create($data);

        return redirect('users')->with('success', 'User Saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $result['user'] = User::find($id);

        return view('users.edit', $result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'role' => 'required',
            'email'=>'required|unique:users,email,'.$id.',id,deleted_at,NULL|email:rfc,filter',
            'name'=>'required',
            'username'=>'required|without_spaces|unique:users,username,'.$id.',id,deleted_at,NULL',
            'password'=>'nullable|without_spaces|min:8',
        ]);

        $data = $request->except('_method', '_token', 'password');

        if($request->get('password') != ''){
            $data['password'] = bcrypt($request->get('password'));
        }

        $user = User::find($id)->update($data);

        return redirect('users')->with('success', 'User Updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id)->delete();

        return redirect()->back()->with('success', 'User Removed!');
    }
}
