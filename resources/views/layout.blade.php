<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h1>@yield('header')</h1>
        </div>
        <div class="container">
             <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span>Categories - <a href="{{ route('categories_list') }}">List</a>/<a href="{{ route('categories_form') }}">Add</a></span>
                    
                <span>Products - <a href="{{ route('products_list') }}">List</a>/<a href="{{ route('products_form') }}">Add</a></span>
            </li>
        </div>
        <br>
        @yield('content')
    </div>
</body>
</html>