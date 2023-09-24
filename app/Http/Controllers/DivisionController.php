<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Position;
use Auth;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['divisions'] = Division::latest()->get();

        return view('divisions.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('divisions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->except(['token', 'method', 'logo', 'photo', 'position_name']);

        // Image Logo
            $destination_logo = 'attachment/division/logo';
            $file = $request->file('logo');

            if($file){
                $name = time()."_".uniqid().".".$file->getClientOriginalExtension();
                $move = $file->move($destination_logo, $name);
                if($move){
                    $data['logo'] = $destination_logo.'/'.$name;
                }
            }
        // Image Logo

        // Image Photo
            $destination_photo = 'attachment/division/photo';
            $file = $request->file('photo');

            if($file){
                $name = time()."_".uniqid().".".$file->getClientOriginalExtension();
                $move = $file->move($destination_photo, $name);
                if($move){
                    $data['photo'] = $destination_photo.'/'.$name;
                }
            }
        // Image Photo

        $division = Division::create($data);

        foreach ($request->get("position_name") as $key_position_name => $position_name) {
             Position::create(
                [
                    "name" => $position_name,
                    "division_id" => $division->id,
                ]
            );
        }

        return redirect('divisi-jabatan')->with('success', 'Divisi dan Jabatan berhasil disimpan!' );
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
        $data['division'] = Division::find($id);

        return view('divisions.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->except(['token', 'method', 'logo', 'photo', 'position_name']);

        // Image Logo
            $destination_logo = 'attachment/division/logo';
            $file = $request->file('logo');

            if($file){
                $name = time()."_".uniqid().".".$file->getClientOriginalExtension();
                $move = $file->move($destination_logo, $name);
                if($move){
                    $data['logo'] = $destination_logo.'/'.$name;
                }
            }
        // Image Logo

        // Image Photo
            $destination_photo = 'attachment/division/photo';
            $file = $request->file('photo');

            if($file){
                $name = time()."_".uniqid().".".$file->getClientOriginalExtension();
                $move = $file->move($destination_photo, $name);
                if($move){
                    $data['photo'] = $destination_photo.'/'.$name;
                }
            }
        // Image Photo

        $division = Division::find($id)->update($data);

        $positions = Position::where("division_id", $id)->delete();

        foreach ($request->get("position_name") as $key_position_name => $position_name) {
            Position::create(
               [
                   "name" => $position_name,
                   "division_id" => $id,
               ]
           );
       }

       return redirect('divisi-jabatan')->with('success', 'Divisi dan Jabatan berhasil di update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $positions = Position::where("division_id", $id)->delete();
        $division = Division::find($id)->delete();

        return redirect()->back()->with('success', 'Divisi berhasil di hapus!');
    }
}
