<?php

namespace App\Http\Controllers;

use App\Mail\BlogPosted;

use App\Models\Post; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;


class PhotoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */

     public function showPost()
     {
         $posts = Post::active()->get();
 
         return view('photoss.tes', ['posts' => $posts]);
     }

    public function index()
    {
        if(!Auth::check()){
            return Redirect('login');
        }

        $photos = Post::active()->get();
        // ->withTrashed()  befungsi untuk mengembalikan data yang terhapus
        $view_data = [
            'photos' => $photos,
        ];

        return view('photoss.index', $view_data);
      
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Auth::check()){
            return Redirect('login');
        }

        return view('photoss.create');
    }

    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        if (!Auth::check()) {
            return redirect('login');
        }

   
            $title = $request->input('title');
            $content = $request->input('content');

        $photo = Post::create([
            'title' => $title,
            'content' => $content,
        ]);

     

        '\Mail'::to(Auth::user()->email)->send(new BlogPosted($photo));

        return redirect('posts');
    }

    /**
     * Display the specified resource.
     */

    public function show(string $id)
    {
        if(!Auth::check()){
            return Redirect('login');
        }
        
        $photo = Post::where('id', $id)->limit(5)
            ->first();
        $comments = $photo->comments()->limit(5)->get();
        $total_comments = $photo->total_comments();

        $view_data = [
            'photo'          => $photo,
            'comments'       => $comments,
            'total_comments' => $total_comments,
        ];

        return view('photoss.show', $view_data);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(!Auth::check()){
            return Redirect('login');
        }

        $photo = Post::where('id', '=', $id)
               ->first();
        $view_data = [
            'photo' => $photo
        ];

        return view('photoss.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(!Auth::check()){
            return Redirect('login');
        }

        $title = $request->input('title');
        $content = $request->input('content');

        Post::where('id', $id)
            ->update([
                'title' => $title,
                'content' => $content,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        return redirect("posts/{$id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!Auth::check()){
            return Redirect('login');
        }
        
        Post::where('id', $id)
            ->delete();

        return redirect('posts');
    }
}
