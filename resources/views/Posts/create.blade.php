<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
</head>
<body>
    <h1>Create a Post</h1>
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <input type="submit" value="Post">
        <a href="{{ route('view.profile', ['id' => auth()->id()]) }}">View Profile</a>

        <br><br><br>
        <a href="{{ route('create') }}">Register</a>
    </form>
    <h2>Recent Posts</h2>
    <ul>
        @foreach ($posts as $post)
            <li>
                <strong>{{ $post->user->name }}</strong>
                <span>Posted at {{ $post->created_at->format('H:i:s d-m-Y') }}</span>
                <br>
                <img src="{{ $post->image }}" alt="Post Image" style="max-width: 500px;">
                <span>Likes: {{ $post->likeCount() }}</span>

                <form action="{{ route('like.post', $post->id) }}" method="POST">
                    @csrf
                    <input type="submit" value="Like">
                </form>
                @if (auth()->id() == $post->user_id)
                <form action="{{ route('delete.post', $post->id ) }}" method="post">
                @csrf
                    <input type="submit" value="Delete">
                </form>
                @endif
            </li>
        @endforeach
    </ul>
</body>
</html>
