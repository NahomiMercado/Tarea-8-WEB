<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Secure Area</h1>
    <p>Welcome, {{auth()->user()->name}}</p>
    <p>This page is protected with auth middleware</p>

    <form method="POST" action="/logout">
        @csrf 
        <button type="submit">Logout</button>
    </form>
</body>
</html>