@extends('layouts.app')

@section('content')
    <div class="container">
    <form action="{{route('posts.update', ['post' => $post])}}" method="POST">
            @method('PUT')
            @csrf
            <input class="form-control mb-2 @error('name') is-invalid @enderror" type="text" placeholder="Name" name="name" value="{{$post->name ?? '' }}">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input class="form-control mb-2" type="text" placeholder="Surname" name="surname" value="{{$post->surname}}">
            <label for="select">Choose Gender</label>
            <select class="form-control mb-2 @error('gender') is-invalid @enderror" id="select" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            @error('gender')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <textarea class="form-control" rows="3" name="description">{{$post->description}}</textarea>
            <button class="btn btn-primary">Save Changes</button>
        </form>
    </div>
@endsection