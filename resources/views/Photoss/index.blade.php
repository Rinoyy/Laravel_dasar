@extends('layout.app')

@section('title', 'selamat datang')



@section('content')
    
                <h1>
                    Blog codePolitan
                    <a class="btn btn-success" href="{{ url('posts/create')}}">+ buat sekarang</a>
                </h1>      
                @foreach($photos as $photo);
                    <div class="col-4 pt-5 ">
                        <div class="card">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ $photo->title }}</h5>
                                <p class="card-text"><p>{{ $photo->content}}</p>
                                <p class="card-text"><p>{{ date("d M Y H:i", strtotime( $photo->created_at )) }}</p>
                                <a href="{{ url("posts/$photo->id") }}" class="btn btn-primary ">Selengkapnya</a>
                                <a href="{{ url("posts/$photo->id/edit") }}" class="btn btn-success ">Edit</a>
                            </div>
                        </div>
                    </div>
 @endforeach
 @endsection
            
    

           