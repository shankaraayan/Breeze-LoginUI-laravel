<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\BharatKeDham;
use App\Models\HomePage;
use App\Models\Blog;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\Userdetails;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Session;

class WebController extends Controller
{


    public function index()
    {
        $banners = Banner::get();
        $blogs = Blog::limit(4)->get();
        $BharatKeDham = BharatKeDham::limit(2)->get();
        return view('welcome')->with(compact('banners', 'blogs', 'BharatKeDham'));
    }

    public function about()
    {
        $about = AboutUs::get();
        return view('about')->with(compact('about'));
    }

    public function event()
    {
        $blogs = Blog::get();
        return view('event')->with(compact('blogs'));
    }

    public function gallery()
    {
        $gallery = Gallery::get();
        // dd($gallery);
        return view('gallery')->with(compact('gallery'));
    }

    public function dynamic($dynamic)
    {
        $about = AboutUs::get();
        $content = AboutUs::get()->first(function ($item) use ($dynamic) {
            return is_array($item['section']) && in_array($dynamic, array_column($item['section'], 'title'));
        });
        if (!$content || !isset($content->id)) abort(404);
        // dd($content);
        return view('content')->with(compact('content', 'about'));
    }

    public function donate()
    {
        return view('donate');
    }
    public function contact()
    {
        return "Contact Page";
    }
    public function blog()
    {
        return "blog Page";
    }

    public function blogDetails($slug)
    {
        return "blog Details Page";
    }
    public function state($state)
    {
        return "state Details Page";
    }
    public function Donation()
    {
        return "Donation Details Page";
    }
    public function Membership()
    {
        return "Membership  Page";
    }
}