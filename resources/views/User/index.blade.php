<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Users</title>
</head>
<body>
    <table border="2">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
            <td><a href="{{ route('edit', $user->id) }}">Update</a></td>
            <td><a href="{{ route('delete', $user->id) }}">Delete</a></td>
        </tr>
        @endforeach
    </table>

    <button onclick="window.location.href='{{ route('create') }}'">Register</button>
    <button onclick="window.location.href='{{ route('login') }}'">Go to Login</button>
</body>
</html>
