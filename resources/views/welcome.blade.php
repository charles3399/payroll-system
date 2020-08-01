<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" crossorigin="anonymous"></script>

        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" crossorigin="anonymous"></script>

    </head>
    <body>

        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/home') }}" style="color:black;font-size:20px;" class="navbar-brand">Dashboard</a>

                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                <a class="dropdown-item" href="{{ route('users.profile') }}"">
                                    Profile
                                </a>

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
                    </ul>
                    @else
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">

                            <ul class="navbar-nav mr-auto">

                            </ul>
                            
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item mr-2">
                                    <a href="{{ route('login') }}" style="color:black;font-size:20px;">Login</a>
                                </li>

                        @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" style="color:black;font-size:20px;">Register</a>
                                </li>
                            </ul>
                        </div>
                        @endif
                @endauth
            @endif
        </nav>


        <div class="container mt-5">
            
            <div class="row">
                <div class="col">
                    <h4>What is E-Payroll?</h4>
                    <p>
                        E-payroll is an online digital payroll management system, its purpose is to automate and lessen the time to manage payroll on each client. It also has a strong security feature to prevent hackers collecting and disrupting sensitive information.
                    </p>
                </div>
    
                <div class="col">
                    <div class="d-flex justify-content-center">
                        <img src="{{asset('images/qq.png')}}" width="205px" height="200px">
                    </div>
                </div>
            </div>

        </div>

        <section style="background-color: rgb(228, 228, 228);" class="mt-5">
            <div class="container" style="padding:25px;">
                <div class="row">

                    <h4>Some random text</h4>
                    <p>
                        There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.
                    </p>
                </div>

                <div class="row">
                    <h4>Another random text</h4>
                    <p>
                        Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.
                    </p>
                </div>

            </div>
        </section>

    </body>
</html>
