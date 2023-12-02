<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\Post\UpdateRequest;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post)
    {
        $data = $request->validated();
 

        $tags = $data['tags'];
        unset($data['tags']); 
        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);
  
    }
}
