<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\WebsiteProfile;
use Illuminate\Http\Request;

class WebsiteProfileController extends Controller
{
     /**
     * Display the specified resource.
     */
    public function index()
    {
        $contact = WebsiteProfile::select('website_name', 'tagline', 'keyword', 'description', 'logo', 'url', 'email', 'hp', 'address', 'map', 'year_now')->first();

        return ResponseFormatter::success($contact, 'Contact retrieved successfully!');
    }
}
