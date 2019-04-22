<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $post = Post::all();
        $user = User::all();
        $category = Category::all();
        return view('admin.dashboard')->with('post',$post)
                                    ->with('trashed_post',Post::onlyTrashed())
                                    ->with('user',$user)
                                    ->with('category',$category);
    }
}
