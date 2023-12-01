@extends('layouts.main')
@section('content')
    <div>
        <form action="{{ route('post.update', $post->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control mb-2" placeholder="title"
                    value={{ $post->title }}>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea id="content" name="content" class="form-control mb-2" placeholder="content">{{ $post->content }}</textarea>
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="text" id="image" name="image" class="form-control mb-2" placeholder="image"
                    value={{ $post->image }}>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select id="category" name="category_id" class="form-control mb-2">
                    @foreach ($categories as $category)
                        <option {{ $category->id === $post->category_id ? 'selected' : '' }} value="{{ $category->id }}">
                            {{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <select id="tags" name="tags[]" class="form-control mb-2" multiple>
                    @foreach ($tags as $tag)
                        <option
                            @foreach ($post->tags as $postTag) {{ $tag->id === $postTag->id ? 'selected' : '' }} @endforeach
                            value="{{ $tag->id }}">
                            {{ $tag->title }}
                        </option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn-primary btn">Update</button>

        </form>

    </div>
@endsection
