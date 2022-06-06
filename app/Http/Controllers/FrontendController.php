<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function welcome()
    {
        return view('welcome');
    }

    public function aboutUs()
    {
        $data['pageTitle'] = "About Us";
        $data['bannerTitle'] = "About Us";
        return view('frontend.about-us', $data);
    }

    public function blogs()
    {
        $data['pageTitle'] = "Latest Blogs";
        $data['bannerTitle'] = "Latest Blogs";
        return view('frontend.blogs', $data);
    }

    public function viewEvents()
    {
        $data['pageTitle'] = "Latest Events";
        $data['bannerTitle'] = "Latest Events";
        $data['events'] = Event::where('is_active', 1)->whereNull('deleted_at')->with('addedBy')->orderBy('id', 'desc')->paginate(3);
        return view('frontend.events', $data);
    }
}

