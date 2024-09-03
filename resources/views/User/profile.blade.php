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
        </tr>
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->password }}</td>
        </tr>
        <br>
    </table>
        <h2>Posts:</h2>
    <ul>
        @foreach ($posts as $post)
            <li>
            <img src="{{ $post->image }}" alt="Post Image" style="max-width: 500px;">
            (Created on: {{ $post->created_at }})
            <form action="{{ route('delete.post', $post->id ) }}" method="post">
                @csrf
                    <input type="submit" value="Delete">
                </form>
            </li>
        @endforeach
    </ul>

    <button onclick="window.location.href='{{ route('posts.create') }}'">posts</button>
    <button onclick="window.location.href='{{ route('create') }}'">Register</button>
</body>
</html>
