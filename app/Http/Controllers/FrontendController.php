<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\post;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\RelatedProduct;
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
        $data['blogs'] = post::with(['user', 'category'])->whereIsActive(1)->whereNull('deleted_at')->paginate(12);
        return view('frontend.blogs', $data);
    }

    public function blogDetail($slug)
    {
        $data['post'] = post::with(['user', 'category'])->whereIsActive(1)->whereNull('deleted_at')->whereSlug($slug)->first();
        $data['pageTitle'] = "Blog Detail";
        $data['bannerTitle'] = "Blog Detail";
        return view('frontend.blog-detail', $data);
    }

    public function viewEvents()
    {
        $data['pageTitle'] = "Latest Events";
        $data['bannerTitle'] = "Latest Events";
        $data['events'] = Event::where('is_active', 1)->whereNull('deleted_at')->with('addedBy')->orderBy('id', 'desc')->paginate(3);
        return view('frontend.events', $data);
    }

    public function eventDetail($slug)
    {
        $data['pageTitle'] = "Event Detail";
        $data['bannerTitle'] = "Event Detail";
        $data['event'] = Event::whereSlug($slug)->whereIsActive(1)->whereNull('deleted_at')->first();
        return view('frontend.event-detail', $data);
    }

    public function charityDonation()
    {
        $data['pageTitle'] = "Charity Donation";
        $data['bannerTitle'] = "Charity Donation";
        return view('frontend.charity-donation', $data);
    }

    public function checkout()
    {
        $data['cart'] = \Cart::GetContent();
        $data['product_total'] = \Cart::GetContent()->count();
        $data['total'] = \Cart::getTotal();
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

    public function productPromotion(Request $request)
    {
        $data['pageTitle'] = "Product Promotion";
        $data['bannerTitle'] = "Product Promotion";
        $data['product_category'] = ProductCategory::whereIsActive(1)->whereNull('deleted_at')->get();
        // $data['products'] = Product::whereNull('category_id')->whereIsActive(1)->whereNull('deleted_at')->paginate(8);
        $data['Category_wise_product'] = Product::where('category_id' , $request->category)->whereIsActive(1)->whereNull('deleted_at')->paginate(8);
        return view('frontend.product-promotion', $data);
    }

    public function productDetail($id)
    {
        $data['pageTitle'] = "Product Detail";
        $data['bannerTitle'] = "Product Detail";
        $data['singleproduct'] = Product::where('id',$id)->get();

        $product_ids = RelatedProduct::where('product_id' , $id)->get()->pluck('related_product_id');
       $data['related_product'] = Product::whereIn('id' , $product_ids)->get();
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
    public function addtocart()
    {
        $data['pageTitle'] = "Add To Card";
        $data['bannerTitle'] = "Add To Card";
        return view('frontend.add-to-cart', $data);
    }

   
   
}
