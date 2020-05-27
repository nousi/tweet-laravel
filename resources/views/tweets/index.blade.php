@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
  <p>ここはメインのサイドバーに追加される</p>

@endsection

@section('content')
  <div class="row px-2 mx-auto my-0">
    @foreach ($tweets as $tweet)
    <div class="card cal-md-4 m-2 overflow-auto ">
      <svg class="bd-placeholder-img card-img-top" width="100%" height="200" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><title>Placeholder</title><rect fill="#868e96" width="100%" height="100%"/><text fill="#dee2e6" dy=".3em" x="50%" y="50%">Image cap</text></svg>
      <div class="card-body">
        <h5 class="card-title">{{$tweet->title}}</h5>
        <p class="card-text readmore-content">{{$tweet->text}}</p>

        <a href="{{ route('tweets.show', $tweet->id) }}" class="btn btn-primary">もっと見る</a>
      </div>
    </div>
    @endforeach
    {{ $tweets->links() }}
  </div>
@endsection
