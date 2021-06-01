@extends('layouts.app')

@section('content')
    <div class="container">
    <form action="/posts/{{$post->id}}/edit" method="GET">
        <p>{{$post->name}}</p>
        <p>{{$post->surname}}</p>
        <p>{{$post->description}}</p>
        <button class="btn btn-primary">Edit</button>
       </form>
       <form action="/posts/{{$post->id}}/add-Comment" method="POST">
           @csrf
           Add comment
           <textarea class="form-control w-25"  rows="3" name="comment"></textarea>
           <button class="btn btn-primary">Add comment</button>
       </form>
       <ul class="list-group mt-2">
            @foreach($post->comment as $comment)
            <li data-id="{{$comment->id}}" class="list-group-item list-group-item-primary w-25">{{$comment->comment}}
                <button data-id="{{$comment->id}}" type="button" class="close" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </li>
        </ul>
            @endforeach
    </div>
    
@endsection
@section('script')
    <script>
        $(document).ready(function(){
        
            $('.close').click(function(){
                $.ajax({
                    method:'DELETE',
                    url:'/posts/delete-comment/' + $(this).data('id'),
                    data:{
                    "_token": "{{ csrf_token() }}", 
                    },
                    success:function() {
                        window.location = "/posts/{{$post->id}}"
                    }
                });

            });

           

        });
    </script>
@endsection