<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GlobalController extends Controller
{
    public function createSlug(Request $request)
    {
        $slug = Str::slug($request->name);
        return $slug;
    }
}
