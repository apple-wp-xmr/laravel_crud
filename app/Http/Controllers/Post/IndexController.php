<?php

namespace App\Http\Controllers\Post;

use App\Http\Filters\PostFilter;
use App\Models\Post;
use App\Http\Requests\Post\FilterRequest;


class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)
    {  

        // $posts = Post::paginate(10);
        // return view('post.index', compact('posts'));

        $data = $request->validated();
        $filter = app()->make( PostFilter::class, ['queryParams' => array_filter($data)]);
        $posts = Post::filter( $filter)->paginate(10);

      return view('post.index', compact('posts'));

    }
}
