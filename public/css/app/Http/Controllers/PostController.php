<?php

namespace App\Http\Controllers;

use App\Models\{Post, Category, Contact};
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $posts = Post::all()->where('user_id', Auth::user()->id)
            ->where('slug', '!==', 'layanan-kami')
            ->where('category_id', '!==', 6);
            $totalPosts = Post::all()->count();
            $messages = Contact::all()->count();
            $activeUsers = User::where('status', '=', 'active')->count();
            $inactiveUsers = User::where('status', '=', 'inactive')->count();
            return view ('admin.index', 
                compact(
                    'activeUsers', 
                    'inactiveUsers', 
                    'posts',
                    'messages',
                    'totalPosts'
                ));
        } else {
            return redirect()->back()->with(['error' => 'ojo dibandingke!']);
        }
        
    }

    public function userPost()
    {
        if (Auth::user()->role == 'user') {
            $totalPosts = Post::all()->count();
            $posts = Post::where('user_id', Auth::user()->id)->get();
            return view('admin.index', compact('posts', 'totalPosts'));
        }else
        {
            return redirect()->back();
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('status', 'enabled')->get();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required|min:10',
            'content'   => 'required|min:10',
            'slug'      => 'unique'
        ]);

        //upload image
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());
            //create post
            Post::create([
                'image'     => $image->hashName(),
                'title'     => addslashes($request->title),
                'content'   => $request->content,
                'user_id'   => auth()->user()->id,
                'slug'      => Str::slug($request->title),
                'category_id'  => $request->category,
                'view'      => 0
            ]);
        } else {
                //create post
            Post::create([
                'title'     => addslashes($request->title),
                'content'   => $request->content,
                'user_id'   => auth()->user()->id,
                'slug'      => Str::slug($request->title),
                'category_id'  => $request->category,
                'view'      => 0
            ]);
        }

        //redirect to index
        if (Auth::user()->role == 'admin') {
            return redirect()->intended('user/dashboard')->with(['success' => 'Data saved succesfully']);
        }else{
            return redirect()->intended('/dashboard')->with(['success' => 'Data saved succesfully']);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //redirect to index
        if (Auth::user()->role == 'admin') {
            return redirect('user/dashboard');
        }else{
            return redirect()->intended('/dashboard');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::where('status', 'enabled')->get();
        if (Auth::user()->id == $post->user_id) {
            return view('posts.edit', compact('post', 'categories'));
        } else{
            return redirect()->back()->with('error', 'kebaikan akan menghasilkan kebaikan');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //validate form
        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title'     => 'required|min:5',
            'content'   => 'required|min:10'
        ]);

        //check if image is uploaded
        if ($request->hasFile('image')) {

            //upload new image
            $image = $request->file('image');
            $image->storeAs('public/posts', $image->hashName());

            //delete old image
            Storage::delete('public/posts/'.$post->image);

            //update post with new image
            $post->update([
                'image'     => $image->hashName(),
                'title'     => $request->title,
                'content'   => $request->content,
                'category_id'  => $request->category,
                'slug'      => Str::slug($request->title)
            ]);

        } else {

            //update post without image
            $post->update([
                'title'     => $request->title,
                'content'   => $request->content,
                'category_id'  => $request->category,
                'slug'      => Str::slug($request->title)
            ]);
        }

        //redirect to index
        if (Auth::user()->role == 'admin') {
            return redirect()->intended('user/dashboard')->with(['success' => 'Data saved succesfully']);
        }else{
            return redirect()->intended('/dashboard')->with(['success' => 'Data saved succesfully']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (Auth::user()->id == $post->user_id) {
            Storage::delete('public/posts/'. $post->image);
            $post->delete();
            if (Auth::user()->role == 'admin') {
                return redirect('user/dashboard')->with(['success' => 'Data deleted succesfully']);
            } else {
                return redirect('dashboard')->with(['success' => 'Data deleted succesfully']);
            }
        } else{
            return redirect()->back()->with('error', 'ingatlah dunia hanya sementara');
        }
        
    }

    public function services()
    {
        if (Auth::user()->role == 'admin') {
            $posts = Post::where('slug', 'layanan-kami')->get();
            return view ('admin.our-services', 
                compact(
                    'posts'
                ));
        } else {
            return redirect()->back()->with(['error' => 'ojo dibandingke!']);
        }
    }

    public function skm()
    {
        if (Auth::user()->role == 'admin') {
            $posts = Post::where('category_id', 5)->get();
            return view('admin.skm', compact('posts'));
        } else {
            return redirect()->back()->with('error', 'Ojo dibandingke!');
        }
    }
}
