<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::get();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return $blog;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }

    /**
     * Switch the status of the blog
     */
    public function switchStatus(Request $request)
    {
        $id = $request->id;
        $blog = Blog::find($id);

        if (!$blog) {
            return response()->json([
                'status' => 0,
                'msg' => 'Blog not found',
            ], 404);
        } else {
            if ($blog->status === 'Draft') {
                $blog->status = 'Published';
            } else {
                $blog->status = 'Draft';
            }
            $blog->save();
            return response()->json([
                'status' => 1,
                'msg' => "Blog status updated",
            ]);
        }
    }
}
