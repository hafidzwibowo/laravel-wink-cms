<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wink\WinkPost;

// <!-- controller blogny -->
class BlogController extends Controller
{
 

public function index()
  {
      $posts = WinkPost::with('tags')
          ->live()
          ->orderBy('publish_date', 'DESC')
          ->simplePaginate(12);
      return view('blog.index', [
          'posts' => $posts,
      ]);
  }

  public function show ($slug)
  {
    $post = WinkPost::live()->whereSlug($slug)->firstOrFail();

    return view('post.index', [
          'post' => $post
    ]);
  }
}
