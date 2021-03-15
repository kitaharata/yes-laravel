<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->take(400)->get();
        $contents = [
            "y", "n", "Y", "N", "yes", "no", "Yes", "No", "YES", "NO", "true", "false",
            "True", "False", "TRUE", "FALSE", "on", "off", "On", "Off", "ON", "OFF"
        ];
        return view('posts.index', ['posts' => $posts, 'contents' => $contents]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = (int) $request->content;
        if ($content < 0 || $content > 31) return back();
        $post = new Post;
        $post->content = $content;
        $post->save();
        return back();
    }
}
