<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Session;
use Auth;

class post_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $post = Post::all();
        return view('admin.post.index')->with('post',$post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

         $category = Category::all();
         $tag = Tag::all();

            if(count($category) > 0 && $tag->count() > 0 )
            {
                 return view('admin.post.create')->with('category',$category)
                                                ->with('tag',$tag);

            }
            else
            {

                Session::flash('info','sorry you must add category at first');
                return redirect()->back();
            }
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       // dd($request->all());

        $datavalidate = $request->validate([

            'title'=>'required',
            'featured'=>'required|image',
            'content'=>'required',
            'category_id'=>'required',
            'tag'=>'required',
            

        ]);

        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        $featured->move('uploads/posts/',$featured_new_name);

        $post = Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'featured'=>'uploads/posts/'.$featured_new_name,
            'category_id'=>$request->category_id,
            'slug'=>str_slug($request->title),
            'user_id'=>Auth::id(),
        ]);
        $post->tags()->attach($request->tag);

        Session::flash('success','post stored sucessuly');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = Post::find($id);
        $category = Category::all();
        $tag = Tag::all();
        return view('admin.post.edit')->with('post',$post)
                                      ->with('category',$category)
                                      ->with('tag',$tag);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $validatedata = $request->validate([
            'title'=>'required',
            'content'=>'required',

        ]);

        $post = Post::find($id);

        if($request->hasFile('featured'))
        {
            $featured = $request->featured;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('uploads/posts/',$featured_new_name);
            $post->featured = 'uploads/posts/'.$featured_new_name;
        }

        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->save();
        $post->tags()->sync($request->tag);

        Session::flash('success','post updated successfuly');

        return redirect()->route('post.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);
        $post->delete();
        Session::flash('success','item trashed succesfuly');
        return redirect()->back();
    }

    public function trashed()
    {
        $post = Post::onlyTrashed()->get();

        return view('admin.post.trashed')->with('post',$post);
    }
    public function kill($id)
    {
        $post = Post::withTrashed()->where('id',$id)->first();
        $post->forceDelete();
        Session::flash('success','post deleted succesfuly');
        return redirect()->back();
    }

    public function restore($id)
    {
        $post = Post::withTrashed()->where('id',$id);
        $post->restore();
        Session::flash('success','post restored successfuly');
        return redirect()->back();
    }

}
