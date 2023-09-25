<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
     /**
     * Display the specified resource.
     */
    public function index()
    {
        $divisions = Division::with("positions")->select('id', 'name', 'full_name', 'color', 'tagline', 'motto', 'description', 'full_description', 'content', 'photo', 'logo')->get();

        return ResponseFormatter::success($divisions, 'Divisions retrieved successfully!');
    }
}
