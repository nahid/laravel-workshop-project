<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\BlogRepository;

class BlogController extends Controller
{
    protected $blog;

    function __construct(BlogRepository $blog)
    {
        $this->blog = $blog;
    }

    public function recentBlog()
    {
        $blogs = $this->blog->with('user', 'category')->all();
        return view('site.blogs.recent', compact('blogs'));
    }
}
