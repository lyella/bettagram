<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Post;  
use Intervention\Image\Facades\Image;


class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //pag hindi ito na-authenticate, hindi niya ira-run yung mga susunod na codes sa kanya. 
    }

    public function index()
    {
        $users = auth()->user()->following()->pluck('profiles.user_id');
        // $posts = Post::whereIn('user_id', $users)->latest()->get();

        $posts = Post::whereIn('user_id', $users)->latest()->paginate(3);

        return view ('posts.index', compact('posts'));
    }

public function create()
{
    return view('posts.create');
}

public function store(){

    $data = request()->validate([
        'caption' => 'required',
        'image' => 'required','image' //this means that the user can only post images
    ]);

    //adding to database
    $imagePath = request('image')->store('uploads', 'public');  //dito mo ilalagay yung mga nauploads

    $image = Image::make(public_path("storage/{$imagePath}"))->resize(1200, 1200); //it will cut the original image and it will fit to the desired resolution
    $image->save();

    auth()->user()->posts()->create([
        'caption' => $data['caption'],
        'image' => $imagePath
    ]);

    // dd(request()->all()); //request is a method here

    return redirect('/profile/'.auth()->user()->id);
}

public function show(\App\Post $post)
{
   return view("posts.show" , compact('post'));
}

}
