@extends("layouts.app")
@section("content")
 <div class="container">
    @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"></button>
    </div>
@endif
 <div class="card mb-2">
 <div class="card-body">
 <h5 class="card-title">{{ $article->title }}</h5>
 <div class="card-subtitle mb-2 text-muted small">   
     by {{ $article->user->name }},
 {{ $article->created_at->diffForHumans() }}
 Category: <b>{{ $article->category->name }}</b>
 </div>
 <p class="card-text">{{ $article->body }}</p>
 <a class="btn btn-warning"
 href="{{ url("/articles/delete/$article->id") }}">
 Delete
 </a>
 </div>
 </div>
 <ul class="list-group">
 <li class="list-group-item active">
 <b>Comments ({{ count($article->comments) }})</b>
 </li>
 @foreach($article->comments as $comment)
 <li class="list-group-item">
 {{ $comment->content }}
 <div class="small mt-2">
 By <b>{{ $comment->user->name }}</b>,
 {{ $comment->created_at->diffForHumans() }}
 </div>
 @auth
<a class=""
 href="{{ url("/comments/delete/$comment->id") }}">
 Delete
 </a>
 @endauth
 </li>
 @endforeach
 </ul>
@auth
<form action="{{ url('/comments/add') }}" method="post">
 @csrf
 <input type="hidden" name="article_id"
 value="{{ $article->id }}">
  <br>
 <textarea name="content" class="form-control mb-2"
 placeholder="New Comment"></textarea>
 <input type="submit" value="Add Comment"
 class="btn btn-secondary">
 </form>
@endauth
 </div>
@endsection