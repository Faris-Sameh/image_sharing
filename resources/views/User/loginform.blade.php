<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <form action="{{ route('login.submit') }}" method="post">
        @csrf
        <input type="email" name="email" placeholder="enter email" required>
        <input type="password" name="password" placeholder="enter password" required>
        <input type="submit" value="Login">
    </form>
<br>
    <button onclick="window.location.href='{{ route('create') }}'">Register</button>
    <button onclick="window.location.href='{{ route('index.User') }}'">View All Users</button>
</body>
</html>
