<?php

namespace App\Http\Controllers;

use App\Models\websiteProfile;
use Auth;
use Illuminate\Http\Request;

class WebsiteProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['website_profile'] = websiteProfile::first();

        return view('website_profiles.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $website_profile = websiteProfile::first();

        $request->validate([
            'website_name' => 'required',
            'keyword'=>'required',
            'url'=>'required',
            'description'=>'required',
            'email'=>'required|email:rfc,filter',
            'year_now'=>'required',
            'address'=>'required',
            'hp'=>'required',
            'map'=>'required',
            'logo'=>'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $data = $request->except(['token', 'method', 'logo']);

        // Image Logo
            $destination = 'attachment/logo_website_profile';
            $file = $request->file('logo');

            if($file){
                $name = uniqid()."_".time().".".$file->getClientOriginalExtension();
                $move = $file->move($destination, $name);
                if($move){
                    $data['logo'] = $destination.'/'.$name;
                }
            }
        // Image Logo

        $data['modified_by'] = Auth::user()->id;
        $data['modified_date'] = date('Y-m-d H:i:s');

        if ($website_profile) {
            // Jika ada maka update
            $website_profile = $website_profile->update($data);
        }else{
            // Jika tidak ada maka create
            $website_profile = websiteProfile::create($data);
        }

        return redirect('website-profile')->with('success', 'Website Profile'.($website_profile ? "Updated!" : "Saved!") );
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
