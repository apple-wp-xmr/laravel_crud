<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Http\Requests\Post\StoreRequest;

class StoreController extends BaseController
{

    public function __invoke(StoreRequest $request)
    {
        
        $data = $request->validated();
        $tags = $data['tags'];
        unset($data['tags']);  
        $post = Post::create($data);
    
        // foreach($tags as $tag){
        //     PostTag::firstOrCreate([  
        //         'post_id' => $post->id,
        //         'tag_id' => $tag,
        //     ]);
        // }

        $post->tags()->attach($tags);
        return redirect()->route('post.index');
    }
}
