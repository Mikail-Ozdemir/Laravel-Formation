@extends('layouts.app')

@section('content')
    <h1>{{ $post->content }}</h1>

    <hr>
    @forelse($post->comments as $comment)
    <div>{{ $comment->content}} | crée le {{ $comment->created_at->format('d/m/Y') }}</div>
    @empty
        <span>aucun commentaire pour ce post</span>
    @endforelse
@endsection
