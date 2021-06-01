<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm ">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " >
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav w-80 d-flex align-items-center">
            <a href="{{action('HomeController@index')}}" class="mr-3 ">Home</a>
            {{-- action directlly on controller --}}
                <a href="/posts" class="mr-3 ">List Of Cards</a>
                <a href="/posts/create" class="mr-3">Create Personal Card</a>
                <a href="/contact-us" class="mr-3">Contact Us</a>
                <form action="/posts" class="d-flex">
                    <input type="text" name="filter" class="form-control" id="search" style="width:200px;" placeholder="Search Here">
                    <button type="submit" class="btn btn-primary ml-3">Search</button>
                </form>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
@section('script')
    <script>
         $(document).ready(function(){
            $('#search').keyup(function(){
                
                    //console.log($(this).val());
                //     $.ajax({
                //     method:'GET',
                //     url:'/posts/search' + $(this).val(),
                //     data:{
                //     "_token": "{{ csrf_token() }}", 
                //     },
                //     success:function() {
                //         window.location = "/posts"
                //     }
                // });
            
            });
         });

    </script>

@endsection
