<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =  Post::latest()->get();
        $modifiedPosts = [];
        foreach ($posts as $post) {
            $modifiedPosts[] = [
                'id' => $post->id,
                'thumbnail' => config('app.url').'/storage/'.$post->image,
                'title' => $post->title,
                'post' => $post->post,
                'slug' => $post->slug,
                'description' => $post->description,
                'date' => $post->created_at->diffForHumans(),
            ];
        }
        return $modifiedPosts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'post' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            dd([$validator, $request->all]);
            return [
                "status" => "failed",
                "message" => "There is something wrong with the form!"
            ];
        }
        Post::create([
            'title' => $request->title,
            'post' => $request->post,
            'description' => $request->description,
            'image' => $request->image->store('images', 'public_disk'),
            'slug' => str_replace(' ', '-', strtolower($request->title))
        ]);
        return response()->json([
            "status" => 'success',
            "message" => 'Post has been created!'
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->get();
        if(count($post) > 0 ){
            return response()->json([
                'id' => $post[0]->id,
                'thumbnail' => config('app.url').'/storage/'.$post[0]->image,
                'title' => $post[0]->title,
                'post' => $post[0]->post,
                'slug' => $post[0]->slug,
                'description' => $post[0]->description,
                'date' => $post[0]->created_at->diffForHumans(),
                'status' => 'success'
            ]);
        }else{
            return response()->json([
                "status" => 'failed',
                "message" => 'No Data Found'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id', $id)->delete();
        return response()->json([
            "status" => 'success',
            "message" => 'Post has been deleted!'
        ], 200);
    }

    public function search($title){
        $result = Post::where('title', 'LIKE', '%'.$title.'%')->get();
        $modifiedPosts = [];
        foreach ($result as $post) {
            $modifiedPosts[] = [ 
                'thumbnail' => config('app.url').'/storage/'.$post->image,
                'title' => $post->title,
                'post' => $post->post,
                'slug' => $post->slug,
                'description' => $post->description,
            ];
        }
        return $modifiedPosts;
    }
}