<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostStored;
use App\Models\Category;
use App\Mail\PostCreated;
use Illuminate\Http\Request;
use App\Events\PostCreatedEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\StorePostRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\PostCreatedNotification;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data = Post::where('user_id',Auth::id())->orderBy('id','desc')->get();
        return view('home',compact('data'));      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $user_id = Auth::id();
        return view('create',compact('categories','user_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        
        $validated = $request->validated();
        $post = Post::create($validated);

        event(new PostCreatedEvent($post));
        return redirect('/posts')->with('status', config('alert.message.created'));
     }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        
        Gate::authorize('view',$post);
        return view('moreinfo',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $user_id = Auth::id();
        Gate::authorize('view',$post);
        $categories = Category::all();
        return view('edit',compact('post','categories','user_id'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
        Gate::authorize('update',$post);
        $validated = $request->validated();
        $post->update($validated);
        return redirect('/posts')->with('status',config('alert.message.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize('delete',$post);
         $post->delete();
         return redirect('/posts')->with('status',config('alert.message.deleted'));
    }
}
