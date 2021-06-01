@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="mx-auto" style="width: 400px;">
            <form action="/contact-us" method="POST">
                <label for="name">Your Name</label>
                <input type="text" name="name" class="form-control mb-2  @error('name') is-invalid @enderror">
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="surname">Your Surname</label>
                <input type="text" name="surname" class="form-control mb-2 @error('surname') is-invalid @enderror">
                @error('surname')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="email">Your E-mail</label>
                <input type="email" name="email" class="form-control mb-2 @error('email') is-invalid @enderror">
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <textarea class="form-control mb-2 @error('text') is-invalid @enderror" rows="4" name="text"></textarea>
                @error('text')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <button type="submit" class="btn btn-primary ">Send Mail</button>
                @csrf
             </form>
        </div>
    </div>
    
@endsection