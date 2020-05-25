@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
  <p>ここはメインのサイドバーに追加される</p>

@endsection

@section('content')
<form method="PATCH" action="{{ route('tweets.update', $tweet) }}">
  @csrf

  <div class="form-group row">
      <label for="title" class="col-md-4 col-form-label text-md-right">タイトル</label>

      <div class="col-md-6">
          <input id="title" type="text" class="form-control @error('name') is-invalid @enderror" name="title" value="{{ $tweet->title }}" required autocomplete="title" autofocus>

          @error('title')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
  </div>

  <div class="form-group row">
      <label for="text" class="col-md-4 col-form-label text-md-right">投稿内容</label>

      <div class="col-md-6">
          <textarea name="text" id="text" cols="30" rows="10" class="form-control @error('text') is-invalid @enderror" value="{{ $tweet->text }}" required autocomplete="text">{{$tweet->text}}</textarea>
          @error('text')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
  </div>

  <div class="form-group row mb-0">
      <div class="col-md-6 offset-md-4">
          <button type="submit" class="btn btn-primary">
              更新する
          </button>
      </div>
  </div>
</form>
@endsection
