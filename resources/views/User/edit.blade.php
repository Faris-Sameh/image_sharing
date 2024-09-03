<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
    <h1>Update Data</h1>
    <form action= "{{ route('update') }}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
        <input type="text" placeholder="enter your name" name="name" value ="{{ $user->name }}" required>
        <input type="email"placeholder="enter your email" name="email" value ="{{ $user->email }}" required>
        <input type="password"placeholder="enter your password" name="password" value ="{{ $user->password }}" required>
        <input type="submit" value="Edit">
    </form>
<br>
    <button onclick="window.location.href='{{ route('index.User') }}'">View All Users</button>
    <button onclick="window.location.href='{{ route('login') }}'">Go to Login</button>
</body>
</html>
