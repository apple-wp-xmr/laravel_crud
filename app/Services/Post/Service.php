<?php

namespace App\Services\Post;
use App\Models\Post;


class Service
{
    public function store($data)
    {

     
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

    }

    public function update($data, $post)
    {
        $tags = $data['tags'];
        unset($data['tags']); 
        $post->update($data);
        $post->tags()->sync($tags);
        
    }
}