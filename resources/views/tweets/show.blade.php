@extends('layouts.app')

@section('title', 'Page Title')

@section('sidebar')
<p>ここはメインのサイドバーに追加される</p>

@endsection

@section('content')
<div class="container">
  <div class="card mb-3">
    <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap">
      <title>Placeholder</title>
      <rect fill="#868e96" width="100%" height="100%" /><text fill="#dee2e6" dy=".3em" x="50%" y="50%">Image cap</text>
    </svg>
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
<div class="container">
  @if (Auth::check())
  <form method="POST" action="{{ route('tweets.comments.store', $tweet) }}">
    @csrf
    <div class="form-group mt-1">
      <input id="text" type="text" class="form-control @error('text') is-invalid @enderror" placeholder="コメントを入力" name="text" value="{{ old('text') }}" required autocomplete="text" autofocus>
      <div class="col-md-6">
        @error('text')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <button type="submit" class="btn btn-primary">
      投稿する
    </button>
</div>
</div>
</form>
@endif
<div class="container">
  <table class="table">
    <thead>

      <tr>
        <th scope="col">name</th>
        <th scope="col">comment</th>
      </tr>
    </thead>

    <tbody class="comments">
      @foreach ($tweet->comments as $comment)
      <tr class="comment" data-id={{ $comment->id}}>
        <td width="30px">{{ $comment->user->name }}</td>
        <td>{{ $comment->text }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
</div>
@endsection

@section('js')
@endsection