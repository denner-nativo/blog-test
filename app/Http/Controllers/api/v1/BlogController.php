<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all()->where('active', true);

        return response()->json($blogs, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|max:255',
                'description' => 'required|max:255',
                'user_id' => ['required', 'integer'],
            ]);
    
            if($validated){
                $data = [
                    'title' => $request->title,
                    'description' => $request->description,
                    'user_id' => $request->user_id,
                    'active' => true
                ]; 
    
                $newBlog = Blog::create($data);
    
                return response()->json($newBlog, 201);
            }

        } catch (\Throwable $th) {
            if($th->status == 422){
                return response()->json($th, 422);
            }
            return response()->json($th, 500);   
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::find($id)->first();
        return response()->json($blog, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $data = $request->only(['title', 'description', 'user_id','active']);

            $blog = Blog::find($id)->first();

            $blog->title = $data->title;
            $blog->description = $data->description;
            $blog->user_id = $data->user_id;
            $blog->active = $data->active;

            $blog->save(); 
            
            return response()->json($blog, 200);
        } catch (\Throwable $th) {
            response()->json($th, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $blog = Blog::find($id)->first();
            $blog->active = $false;
            $blog->save(); 
            
            return response()->json(null, 204);
        } catch (\Throwable $th) {
            response()->json($th, 500);
        }
    }
}
