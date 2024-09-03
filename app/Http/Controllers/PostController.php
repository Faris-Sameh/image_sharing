<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Traits\ImagesTrait;
use App\Models\Likes;

class PostController extends Controller
{
    use ImagesTrait;
    
    public function create()
    {        $posts = Post::all();
        return view('Posts.create', compact('posts'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'image'=> 'image|mimes:jpg,jpeg,png,gif'
        ]);

        if($request->hasfile('image')){
            $image= $request->file('image');
            $imageName= $this->uploadimage($image);
            Post::create([
                'user_id' => auth()->id(),
                'image' => $imageName
            ]);
            return redirect()->route('posts.create');
        }
    }
    public function destroy($id){
        $post= Post::find($id);
        if($post && auth()->id() == $post->user_id){
            $post->delete();
        }
        return redirect()->route('posts.create');
    }

    public function like($postId)
{
    $post = Post::find($postId);
    $like = new Likes();
    $like->user_id = auth()->id();
    $like->post_id = $postId;
    $like->save();
    return redirect()->route('posts.create');
}


}