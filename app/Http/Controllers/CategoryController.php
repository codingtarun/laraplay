<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        Category::create($data);
        return redirect()->back()->with('success', 'New cateogry added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view('admin.category.view', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();
        $category->update($data);
        return redirect(route('category.index'))->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('category.index'))->with('danger', 'Category moved to trash');
    }

    /**
     * Return trashed resources 
     */
    public function trash()
    {
        $trashedCategories = Category::onlyTrashed()->get();
        return view('admin.category.trash', compact('trashedCategories'));
    }
    /**
     * Restore the resource
     */

    public function restore($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->firstOrFail();
        $category->restore();
        return redirect(route('category.trash'))->with('primary', 'Category restored');
    }
    /**
     * Permanently delete resource
     */

    public function forceDelete($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->firstOrFail();
        $category->forceDelete();
        return redirect(route('category.trash'))->with('danger', 'Category deleted permanently');
    }
    /**
     * Switch the status of the blog
     */
    public function switchStatus(Request $request)
    {
        $id = $request->id;
        $category = Category::find($id);

        if (!$category) {
            return response()->json([
                'status' => 0,
                'msg' => 'Blog not found',
            ], 404);
        } else {
            if ($category->status === 'Draft') {
                $category->status = 'Published';
            } else {
                $category->status = 'Draft';
            }
            $category->save();
            return response()->json([
                'status' => 1,
                'msg' => "Blog status updated",
            ]);
        }
    }
}
