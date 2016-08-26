<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\CategoryRepository;
use App\Repositories\BlogRepository;

use Validator;

class BlogController extends Controller
{
    protected $category;
    protected $blog;
    function __construct(CategoryRepository $category, BlogRepository $blog)
    {
        $this->middleware('auth');
        $this->category = $category;
        $this->blog = $blog;
    }

    public function newBlogForm()
    {
        $categories = $this->category->all();
        return view('admin.blogs.new', compact('categories'));
    }

    public function saveBlog(Request $req)
    {
        $rules = [
            'title'=>'required',
            'category'=>'required',
            'blog'=>'required'
        ];

        $valid = Validator::make($req->input(), $rules);

        if($valid->fails()) {
            return redirect()->back()->withErrors($valid);
        }

        $data = [
            'title'=>$req->input('title'),
            'category_id'=>$req->input('category'),
            'blog'=>$req->input('blog'),
            'user_id'=>auth()->user()->id,
            'status'=>1
        ];

        if($this->blog->create($data)) {
            return redirect()->back()->with('msg', 'success');
        }

        return redirect()->back()->with('msg', 'fail');

    }
}
