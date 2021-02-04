<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="public/source/css/style.css">
    <link rel="stylesheet" href="public/source/css/bootstrap.min.css">
    <script src="public/source/js/bootstrap.min.js"></script>
</head>
<body>  
<h4 class="text-center col-md-10 pt-5">Đăng nhập</h4> 
    <form class="container d-block mx-auto pt-3" action="{{route('user.login')}}" method="POST">
    @csrf
        <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" placeholder="Email" name="email" id="email">
            @if($errors->has('email'))
                <p class="text-danger">{{$errors->first('email')}}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter password" id="password" >
            @if($errors->has('password'))
                <p class="text-danger">{{$errors->first('password')}}</p>
            @endif
        </div>
        <input type="submit" value="Đăng nhập" class="btn btn-danger"> <br> <br>
        @if (session('message'))
        <div class="alert alert-danger text-center">
            <strong>{{session('message')}}</strong>
        </div>
            @endif
    </form>
</body>
</html>