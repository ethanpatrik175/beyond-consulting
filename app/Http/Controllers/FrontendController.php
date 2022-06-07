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

    public function charityDonation()
    {
        $data['pageTitle'] = "Charity Donation";
        $data['bannerTitle'] = "Charity Donation";
        return view('frontend.charity-donation', $data);
    }

    public function checkout()
    {
        $data['pageTitle'] = "Checkout";
        $data['bannerTitle'] = "Checkout";
        return view('frontend.checkout', $data);
    }

    public function contact()
    {
        $data['pageTitle'] = "Contact Us";
        $data['bannerTitle'] = "Contact Us";
        return view('frontend.contact', $data);
    }

    public function productPromotion()
    {
        $data['pageTitle'] = "Product Promotion";
        $data['bannerTitle'] = "Product Promotion";
        return view('frontend.product-promotion', $data);
    }

    public function blogDetail($slug)
    {
        $data['pageTitle'] = "Blog Detail";
        $data['bannerTitle'] = "Blog Detail";
        return view('frontend.blog-detail', $data);
    }

    public function productDetail($slug)
    {
        $data['pageTitle'] = "Product Detail";
        $data['bannerTitle'] = "Product Detail";
        return view('frontend.product-detail', $data);
    }

    public function travelPackages()
    {
        $data['pageTitle'] = "Travel Packages";
        $data['bannerTitle'] = "Travel Packages";
        return view('frontend.travel-packages', $data);
    }

    public function travelPackageDetail($slug)
    {
        $data['pageTitle'] = "Travel Package Detail";
        $data['bannerTitle'] = "Travel Package Detail";
        return view('frontend.travel-package-detail', $data);
    }
}

