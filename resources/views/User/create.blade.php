<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Welcome</h1>
        <form action="{{ route('store') }}" method="POST">
            @csrf
            <input type="text" placeholder="Enter your name" name="name" required>
            <input type="email" placeholder="Enter your email" name="email" required>
            <input type="password" placeholder="Enter your password" name="password" required>
            <input type="submit" value="Register">
        </form>
        <br>
        <button onclick="window.location.href='{{ route('index.User') }}'">View All Users</button>
        <button onclick="window.location.href='{{ route('login') }}'">Go to Login</button>
        @if (Auth::check())
        <p>logged in as {{ Auth::user()->name }}.</p>
        <a href="{{ route('posts.create') }}">View posts</a>
        <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
        </form>
        @endif
</body>
</html>
