@extends('layouts.main')
@section('content')
    <div>
        <a class="btn btn-primary mb-3" href="{{ route('post.create') }}">Add one</a>
        @foreach ($posts as $post)
            <div>
                <a href="{{ route('post.show', $post->id) }}">
                    {{ $post->id }}. {{ $post->title }}
                </a>
            </div>
        @endforeach


    </div>
@endsection
