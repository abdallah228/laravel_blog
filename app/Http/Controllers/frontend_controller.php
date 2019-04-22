<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\Category;
use App\Post;
use App\Tag;
class frontend_controller extends Controller
{
    //

    public function index()
    {
    	$setting = Setting::first();
    	$category = Category::take(4)->get();
    	$post = Post::orderBy('created_at','desc')->first();
    	return view('index')->with('title',$setting->site_name)
    	->with('category',$category)
    	->with('first_post',$post)
    	->with('second_post',Post::orderBy('created_at','desc')->skip(1)->take(1)->first())
    	->with('third_post',Post::orderBy('created_at','desc')->skip(2)->take(1)->first())
    	->with('cat5',Category::find(5))
    	->with('cat6',Category::find(6))
    	->with('setting',Setting::first());
    	
    }
    public function single($slug)
    {
    	$post = Post::where('slug',$slug)->first();

    	$next_id = Post::where('id','>',$post->id)->min('id');

    	$prev_id = Post::where('id','<',$post->id)->max('id');
    	return view('single')->with('post',$post)
    						->with('title',$post->title)
    						->with('setting',Setting::first())
    						->with('category',Category::take(4)->get())
    						->with('next',Post::find($next_id))
    						->with('prev',Post::find($prev_id))
    						->with('tags',Tag::all());


    }

    public function category($id)
    {


       
        $category = Category::find($id);
        return view('category')->with('categorry',$category)
                                ->with('title',$category->name)
                                ->with('category',Category::take(4)->get())
                               ->with('setting',Setting::first());



    }

    public function tag($id)
    {
        $tag = Tag::find($id);

        return view('tag')->with('tag',$tag)
                        ->with('title',$tag->tag)
                        ->with('category',Category::take(4)->get())
                        ->with('setting',Setting::first());
    }


    public function search()
    {

        $post = Post::where('title','like', '%' . request('query') . '%')->get();
        return view('search')->with('post',$post)
                                ->with('title','search result is : ' . request('query'))
                                ->with('category',Category::take(4)->get())
                                ->with('setting',Setting::first())
                                ->with('query',request('query'));
    }


}
