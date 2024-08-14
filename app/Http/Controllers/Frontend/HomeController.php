<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index() {

        $data['blogs'] = Blog::active()->paginate(10);

        return view('frontend.home', $data);
    }
}
