<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Post;
use App\Models\PostTag;


class PostController extends Controller
{
    //
    public function index(){
        $posts = Post::all();
     
        return view('post.index', compact('posts'));
    }

    public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store(Request $request){
        $data = request()->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|string',
            'category_id' => 'string',
            'tags' => ''

        ]);

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

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {   
        $categories = Category::all();
        $tags = Tag::all();

        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post){
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => 'string',
            'tags' => ''

        ]);

        $tags = $data['tags'];
        unset($data['tags']); 
        $post->update($data);
        $post->tags()->sync($tags);

        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    // firstOrCreate
    public function firstOrCreate()
    {
        // $post = Post::find(1);
        // dd($post->title);

        $anotherPost = [
            'title' => 'A some Post',
            'content' => ' A This is the content of the first post.',
            'image' => ' A image.jpg',
            'likes' => 3233,
            'is_published' => 0,
        ];

        $post = Post::firstOrCreate(['title' => 'some Post'], $anotherPost);
        dd($post);
    }
    // updateOrCreate
}
