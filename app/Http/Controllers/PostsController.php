<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Illuminate\Support\Str;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd( Str::upper("{$request->filter}%"));
        $posts = Post::where('name','LIKE', "{$request->filter}%")->get();

        //$posts = Post::all();
        
        //->orWhere('name','LIKE', Str::upper("{$request->filter}%"))
        //->paginate(1);
        //if you want to grab whole list you need to use ->get()
        $males = Post::male()->get();
        $females = Post::female()->get();

        
        //$comment = Comment::where('id', 1)->first();
        
        
        return view('posts.index', compact('posts', 'males', 'females'));
        //->with('posts', $posts);
        //->with(['posts'=> $posts, 'comments' => $comments]);
        //return view ('posts.index', compact('posts', 'comment'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        //dd($request);
        $data = $request->validate([
            'name' => 'required|max:25',
            'surname' => 'required',
            'description' => 'required',
            'gender' => 'required',
        ]);
        //dd($data);
        //$m=gettype($request);
        //dd($m);
        
        //First way
        // $post = new Post();
        // $post->fill($request->merge(['user_id' => auth()->user()->id])->toArray())->save();

        //Second Way
        // $post = new Post();
        // $post->name = $request->name;
        // $post->surname = $request->surname;
        // $post->description = $request->description;
        // $post->user_id = auth()->user()->id;
        // $post->Save();

        //Third way
        Post::create([
        'name' => $request->name,
        'surname' => $request->surname,
        'description' => $request->description,
        'gender' => $request->gender,
        'user_id'=> auth()->user()->id,
        ]);

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($post)//Post $post
    {
        //a more i prosledim $id i u find stavim $id

        $post = Post::find($post);
        
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( Post $post)
    {
        
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'name' => 'required|max:25',
            'surname' => 'required',
            'description' => 'required',
            'gender' => 'required',
        ]);
        

        //$post->update($request->toArray());
        $post->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'description' => $request->description,
            'gender' => $request->gender,
        ]);

        return redirect("/posts");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {

        $post->delete();
        $post->comment()->delete();
        return redirect("/posts");
    }

    public function addComment(Request $request, Post $post)
    {
        Comment::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comment' => $request->comment,
        ]);

        return redirect()->back();
    }

    public function deleteComment(Comment $comment)
    {
        $comment->delete();
    }

   
}
