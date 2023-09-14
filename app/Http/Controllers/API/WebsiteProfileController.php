<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\websiteProfile;
use Illuminate\Http\Request;

class WebsiteProfileController extends Controller
{
     /**
     * Display the specified resource.
     */
    public function index()
    {
        $website_profile = websiteProfile::select('website_name', 'tagline', 'keyword', 'description', 'logo', 'url', 'email', 'hp', 'address', 'map', 'year_now')->first();

        return ResponseFormatter::success($website_profile, 'Website profile retrieved successfully!');
    }
}
