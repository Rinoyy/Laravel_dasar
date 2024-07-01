@extends('layout.app')
@section('title', "judul: $photo->title")

@section('content')
    <div class="container">
        <article class="blog-post">
            <h2 class="display-5 link-body-emphasis mb-1">{{ $photo->title }}</h2>
            <p>tanggal {{ date('d M Y H:i', strtotime($photo->created_at)) }}</p>
            <p>ini kontennya {{ $photo->content }}</p>

            <small class="text-muted">{{$total_comments }}Komentar</small>

            @foreach ($comments as $comment)
                <div class="card mb-3">
                    <div class="card-body">
                        <p style="font-size: 8pt">{{ $comment->comment }}</p>
                    </div>
                </div>
            @endforeach
        </article>
        <a href="{{ url("posts") }}">KEMBALI</a>
    </div>
    @endsection