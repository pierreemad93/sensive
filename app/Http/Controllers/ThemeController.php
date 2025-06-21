<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    //
    public function index()
    {
        $blogs = Blog::latest()->paginate(4);
        return view('theme.index', ['blogs' => $blogs]);
    }
    public function categories()
    {
        return view('theme.category');
    }
    public function contactUs()
    {
        return view('theme.contact-us');
    }
}
