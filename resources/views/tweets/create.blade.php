@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
<p>ここはメインのサイドバーに追加される</p>

@endsection

@section('content')
<form method="POST" action="{{ route('tweets.store') }}" enctype="multipart/form-data">
    @csrf

    <div class="form-group row">
        <label for="title" class="col-md-4 col-form-label text-md-right">タイトル</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

            @error('title')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>


    <div class="form-group row">
        <label for="text" class="col-md-4 col-form-label text-md-right">投稿内容</label>

        <div class="col-md-6">
            <textarea name="text" id="text" cols="30" rows="10" class="form-control @error('text') is-invalid @enderror" value="{{ old('text') }}" required autocomplete="text"></textarea>
            @error('text')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="text" class="col-md-4 col-form-label text-md-right">画像</label>
        <div class="col-md-6">
            <input type="file" name="image" size="30">
            @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                投稿する
            </button>
        </div>
    </div>
</form>
@endsection