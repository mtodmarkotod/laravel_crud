@extends('layouts.app')
@section('title', 'Create Post')
@section('content')
<div class="container">
<form action="{{route('posts.store')}}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input class="form-control mb-2 @error('name') is-invalid @enderror" type="text" value="{{old('name')}}" placeholder="Enter your name" name="name">
        @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="name">Surname</label>
        <input class="form-control mb-2 @error('surname') is-invalid @enderror" type="text" value="{{old('surname')}}" placeholder="Enter your surname" name="surname">
        @error('surname')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <label for="description">Message</label>
        <textarea class="form-control mb-2  @error('description') is-invalid @enderror" rows="3"  name="description">{{old('description')}}</textarea>
        @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <label for="select">Choose Gender</label>
            <select class="form-control mb-2 @error('gender') is-invalid @enderror" id="select" name="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
            </select>
            @error('gender')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        <button class="btn btn-primary mt-2" type="submit">Create</button>
    </form>
</div>
@endsection