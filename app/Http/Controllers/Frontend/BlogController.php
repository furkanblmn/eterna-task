<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Exception;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    function show($slug)
    {
        try {
            $data['blog'] = Blog::where('slug', $slug)->firstOrFail();
            return view('frontend.blog_detail', $data);
        } catch (Exception $e) {
            return $e;
        }
    }
}
