@extends('layout.app')
@section('title', 'ubah postingan')

@section('content')
    

    <div class="container">
        <h1 class="mt-5">Edit Postingan</h1>
        <form method="POST" action="{{ url("posts/$photo->id") }}" class="mt-3">
            @method('PATCH')
            @csrf


            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $photo->title }}"> 
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Konten</label>
                <textarea class="form-control" id="content" rows="3" name="content">{{ $photo->content }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <form method="POST" action="{{ url("posts/$photo->id")}}">
         @method('DELETE');
         @csrf
         <button type="submit" class="btn btn-danger">Hapus</button>
    </form>

    @endsection