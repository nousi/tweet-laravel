@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
  <p>ここはメインのサイドバーに追加される</p>

@endsection

@section('content')
<div class="container">
  <div class="card mb-3">
    <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect fill="#868e96" width="100%" height="100%"/><text fill="#dee2e6" dy=".3em" x="50%" y="50%">Image cap</text></svg>
    <div class="card-body">
      <h5 class="card-title">{{$tweet->title}}</h5>
      <p class="card-text">{{$tweet->text}}</p>
      @if (Auth::check())
        @if($tweet->user_id === $user->id)
        <form method="post" action="{{ route('tweets.destroy', $tweet) }}">
          @csrf
          @method('DELETE')
          <a href="{{ route('tweets.edit', $tweet) }}" class="btn btn-success btn-sm">編集</a>
          <input type="submit" value="削除" class="btn btn-danger btn-sm" onclick='return confirm("削除してもよろしいですか？");'>
        </form>
        @endif
      @endif
    </div>
  </div>
</div>
@endsection
