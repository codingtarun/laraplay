<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Http\Traits\HandleImage;
use Illuminate\Support\Str;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Image as Img;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Laravel\Facades\Image;

class BlogController extends Controller
{
    use HandleImage;
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
        $categories = Category::all();
        return view('admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        // Get validated data
        $data = $request->validated();
        // Add logged in user ID i.e author of the post
        $data['user_id'] = Auth::id();
        // Store the blog
        DB::beginTransaction();
        $blog = Blog::create($data);
        // Attach Categories to blog
        $blog->categories()->attach($data['categories']);
        // Check if 'images' exits
        if (array_key_exists('images', $data)) {
            // Loop over each image and upload one by one
            foreach ($request->file('images') as $image) {
                $imageName = $this->upload($image);
                // after image is uplaoded store image title to image table and store image ID in array
                $image = Img::create([
                    'title' => $imageName,
                ]);
                $blog->images()->attach($image->id);
            }
        }
        DB::commit();
        // Return to blog index page with success message
        return redirect()->back()->with('success', 'New blog added');
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
        $categories = Category::all();
        return view('admin.blog.edit', compact('blog', 'categories'));
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
