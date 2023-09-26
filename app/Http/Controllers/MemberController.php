<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['members'] = Member::latest()->get();

        return view('members.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except(['token', 'method', 'photo']);

        // Image Photo
            $destination = 'attachment/member_photo';
            $file = $request->file('photo');

            if($file){
                $name = uniqid()."_".time().".".$file->getClientOriginalExtension();
                $move = $file->move($destination, $name);
                if($move){
                    $data['photo'] = $destination.'/'.$name;
                }
            }
        // Image Photo

        $member = Member::create($data);

        return redirect('anggota')->with('success', 'Member berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $result['member'] = Member::find($id);

        return view('members.edit', $result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->except(['token', 'method', 'photo']);

        // Image Photo
            $destination = 'attachment/member_photo';
            $file = $request->file('photo');

            if($file){
                $name = uniqid()."_".time().".".$file->getClientOriginalExtension();
                $move = $file->move($destination, $name);
                if($move){
                    $data['photo'] = $destination.'/'.$name;
                }
            }
        // Image Photo

        $member = Member::find($id)->update($data);

       return redirect('anggota')->with('success', 'Anggota berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $member = Member::find($id)->delete();

        return redirect()->back()->with('success', 'Anggota berhasil di hapus!');
    }
}
