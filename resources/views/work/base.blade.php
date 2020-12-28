<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>auth @yield('title')</title>
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
    <a href="" class="navbar-brand text-dark">Bolgauth</a>
    <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a href="{{route('post.index')}}"class="btn btn-light me-2 btn-sm">Home</a></li>
      
        @auth
        <li class="nav-item"><a href="{{route('post.create')}}"  class="btn btn-light me-2 btn-sm">Insert</a></li>
        <form action="{{route('logout')}}" method="POST">
        @csrf
        <input type="submit" class="btn btn-dark btn-sm" value="logout">
    
    </form>    
        @endauth
        @guest
        <li class=" nav-item"><a href="{{route('login')}}"  class="btn btn-light btn-sm me-2">Login</a></li>    
        <li class=" nav-item"><a href="{{route('register')}}"  class="btn btn-dark btn-sm  me-2">Create an account</a></li>    
        @endguest
    </ul>
    </nav>
    @yield('content')
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>