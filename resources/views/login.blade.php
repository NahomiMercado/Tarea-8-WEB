<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Welcome to Login</h1>
    @if(session('success'))
        <p>{{session('success')}}</p>
    @endif

    @if ($errors->any())
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif 

    <form method="POST" action="/login">
        @csrf 
        <label>Email:</label><br>
        <input type="email" name="email" value="{{old ('email')}}"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password"><br><br>

        <button type="submit">Login</button>
    </form>

    <br>
    <a href="/register">Go to Register</a>
    
</body>
</html>