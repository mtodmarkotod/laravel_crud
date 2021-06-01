@extends('layouts.app')
@section('title', 'All Posts')
@section('content')
<div class="container">

   @foreach($posts as $post)
    <div class="card mb-1" style="width: 18rem;">
        <div class="card-header">
        <p>{{$post->id}}</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">{{$post->name}}</li>
          <li class="list-group-item">{{$post->surname}}</li>
          <li class="list-group-item">{{$post->description}}</li>
          <li class="list-group-item">{{$post->gender}}</li>
        </ul>
      </div>
      <small> {{$post->created_at->diffForHumans()}}</small>
      <div class="d-flex mr-2" style="width: 18rem;">
          <a href="/posts/{{$post->id}}" class="btn btn-primary mb-3 mr-2 mt-1">View</a>
          <a href="/posts/{{$post->id}}/edit" class="btn btn-primary mb-3 mr-2 mt-1">Edit</a>
          <form action="/posts/{{$post->id}}" method="POST">
            @method("DELETE")
            <button class="btn btn-primary mb-3 mt-1">Delete</button>
            @csrf
          </form>
      </div>
 @endforeach
 {{-- {{ $posts->links() }} --}}
 
 {{-- <div class="row">
   <div class="col-6">
      @foreach($males as $male)
      <div class="card mb-1" style="width: 18rem;">
          <div class="card-header">
          <p>{{$male->id}}</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">{{$male->name}}</li>
            <li class="list-group-item">{{$male->surname}}</li>
            <li class="list-group-item">{{$male->description}}</li>
            <li class="list-group-item">{{$male->gender}}</li>
          </ul>
        </div>
        <small> {{$male->created_at->diffForHumans()}}</small>
        <div class="d-flex mr-2" style="width: 18rem;">
            <a href="/posts/{{$male->id}}" class="btn btn-primary mb-3 mr-2 mt-1">View</a>
            <a href="/posts/{{$male->id}}/edit" class="btn btn-primary mb-3 mr-2 mt-1">Edit</a>
            <form action="/posts/{{$male->id}}/delete" method="POST">
              @method("DELETE")
              <button class="btn btn-primary mb-3 mt-1">Delete</button>
              @csrf
            </form>
        </div>
   @endforeach
   </div>
   <div class="col-6">
      @foreach($females as $female)
      <div class="card mb-1" style="width: 18rem;">
          <div class="card-header">
          <p>{{$female->id}}</p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">{{$female->name}}</li>
            <li class="list-group-item">{{$female->surname}}</li>
            <li class="list-group-item">{{$female->description}}</li>
            <li class="list-group-item">{{$female->gender}}</li>
          </ul>
        </div>
        <small> {{$female->created_at->diffForHumans()}}</small>
        <div class="d-flex mr-2" style="width: 18rem;">
            <a href="/posts/{{$female->id}}" class="btn btn-primary mb-3 mr-2 mt-1">View</a>
            <a href="/posts/{{$female->id}}/edit" class="btn btn-primary mb-3 mr-2 mt-1">Edit</a>
            <form action="/posts/{{$female->id}}/delete" method="POST">
              @method("DELETE")
              <button class="btn btn-primary mb-3 mt-1">Delete</button>
              @csrf
            </form>
        </div>
   @endforeach --}}
   </div>
 </div>
</div>
@endsection