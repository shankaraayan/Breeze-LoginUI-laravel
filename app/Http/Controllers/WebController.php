<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\BharatKeDham;
use App\Models\HomePage;
use App\Models\Blog;
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
        return "About Page";
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
