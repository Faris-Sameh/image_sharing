<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create(){
        return view("User.create");
    }

    public function store(Request $request){
        User::create([
            "name"=> $request->name,
            "email"=>$request->email,
            "password"=>$request->password
        ]);
        return redirect()->route("index.User");
    }
    public function index(){
        $users= User::all();
        return view("User.index", compact("users"));
    }
    public function update($id){
        $user = User::find($id);
        return view("User.edit", compact("user"));
    }
    public function edit(Request $request){
        $user= User::find($request->id);
        $user->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "password"=>$request->password
        ]);
        return redirect()->route("index.User");
    }
    public function delete($id){
        $user= user::find($id);
        $user->delete();
        return redirect()->route("index.User");
    }
    public function loginform(){
        return view("User.loginform");
    }
    public function login(Request $request){
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            return redirect()->route('posts.create');
        }
    
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('create');
    }
    public function profile($id)
    {
        $user = User::find($id);
        $posts = $user->posts;
        return view('User.profile', compact('user', 'posts'));
    }
    
}