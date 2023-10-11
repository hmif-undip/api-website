<?php

namespace App\Http\Controllers;

use App\Models\GeneralMembers;
use Illuminate\Http\Request;

class GeneralMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['general_members'] = GeneralMembers::latest()->get();

        return view('general_members.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('general_members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'nim'=>'required',
            'year'=>'required',
            'telephone'=>'required',
            'home_address'=>'required',
            'email'=>'required|email:rfc,filter',
        ]);

        $generalMembers = GeneralMembers::updateOrCreate([
            //Add unique field combo to match here
            //For example, perhaps you only want one entry per user:
            'nim' => $request->get('nim'),
        ],[
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'nim' => $request->get('nim'),
            'year' => $request->get('year'),
            'telephone' => $request->get('telephone'),
            'home_address' => $request->get('home_address'),
            'boarding_address' => $request->get('boarding_address'),
        ]);

        return redirect()->back()->with('success', 'Data Anda Telah Disimpan! Terimakasih telah mengisi :)');
    }

    /**
     * Display the specified resource.
     */
    public function show(GeneralMembers $generalMembers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GeneralMembers $generalMembers)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GeneralMembers $generalMembers)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GeneralMembers $generalMembers)
    {
        //
    }
}
