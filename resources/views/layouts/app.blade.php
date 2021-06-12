<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        jQuery(document).ready(function ($) {
            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        })
    </script>
    <style>
        body {
            overflow-x: hidden;
        }

        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -15rem;
            -webkit-transition: margin .25s ease-out;
            -moz-transition: margin .25s ease-out;
            -o-transition: margin .25s ease-out;
            transition: margin .25s ease-out;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
        }

        #sidebar-wrapper .list-group {
            width: 15rem;
        }

        #page-content-wrapper {
            min-width: 100vw;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: 0;
        }

        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
            }

            #wrapper.toggled #sidebar-wrapper {
                margin-left: -15rem;
            }
        }
    </style>
</head>
<body>
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
        <div class="sidebar-heading"> Name</div>
        <div class="list-group list-group-flush">
            <a href="{{ route ('dashboard') }}" class="list-group-item list-group-item-action bg-light">Dashboard</a>
            <a href="{{ route ('schedule') }}" class="list-group-item list-group-item-action bg-light">Schedule</a>
            <a href="{{ route ('teacher') }}" class="list-group-item list-group-item-action bg-light">Teacher</a>
            <a href="{{ route ('subjects') }}" class="list-group-item list-group-item-action bg-light">Subjects</a>
            <a href="{{ route ('course') }}" class="list-group-item list-group-item-action bg-light">Courses</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Status</a>
        </div>
    </div>
    <!-- /#sidebar-wrapper -->
    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
            <button class="btn btn-primary" id="menu-toggle">Esconder/Mostrar</button>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="flex items-center">

                <li>
                    <a href="{{ route('login') }}" class="p-3">Login</a>
                </li>
                @auth
                    <li>
                     <a href="" class="p-3">{{ auth()->user()->name }}</a>
                    </li>

                    <li>
                        <a href="{{ route('logout') }}" class="p-3">Logout</a>
                    </li>

                @endauth
                <li>
                    <a href="{{ route('register') }}" class="p-3">Register</a>
                </li>
            </ul>


            <i class="fa fa-home"></i>
            <a href="/"> &nbsp; Home</a> /
            <i class="fa fa-angle-right"></i>



            @for($i = 0; $i <= count(Request::segments()); $i++)

                <a href="">{{Request::segment($i)}}</a>
                @if($i < count(Request::segments()) & $i > 0)
                    {!!'<a class="fa fa-angle-right"></a>'!!}
                @endif

            @endfor

        </nav>
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

</div>
<!-- /#wrapper -->


</body>
</html>


