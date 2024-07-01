<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('bootstrap-5/css/bootstrap.min.css') }}" rel="stylesheet">
    <script src="../bootstrap-5/js/bootstrap.bundle.min.js"></script>

    <style>
        /* *{
            margin: 0px !important;
            padding: 0px !important;
        } */
        .blog {
            padding: 5px;
            border-bottom: 1px solid lightgrey;
        }
        small {
            color: grey;
        }
        .container, .container-fluid, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl{
            padding-right: calc(var(--bs-gutter-x)* -5);
            padding-left: calc(var(--bs-gutter-x)* -5);
        }
    </style>
</head>

<body>


 <div class="container-fluid">
    @include('layout.app.header')

    @yield('content')
    @include('layout.app.footer')


</div>

</div>

</body>

</html>