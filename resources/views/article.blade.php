@extends('layouts.app')

@section('content')
    <h1>{{ $post->content }}</h1>
    <span>{{ $post->image ? $post->image->path : "pas d'image" }}</span>
    <hr>
    @forelse($post->comments as $comment)
    <div>{{ $comment->content}} | crée le {{ $comment->created_at->format('d/m/Y') }}
    </div>
    @empty
        <span>Aucun commentaire pour ce post.</span>
    @endforelse
    <hr>
    @forelse($post->tags as $tag)
        <span>{{ $tag->name }}</span>
    @empty
        <span>Aucun tags pour ce post.</span>
    @endforelse
    {{-- <hr>

   <span>Nom de l'artiste de l'image : {{ $post->imageArtist->name }} </span>
    J'GARDE LE HAUT JUSTE POUR EXEMPLE --}}
    {{--<span>Commentaire le plus récent : {{ $post->latestComment->content }}</span>
    <span>Commentaire le plus récent : {{ $post->oldestComment->content }}</span>--}}

@endsection
