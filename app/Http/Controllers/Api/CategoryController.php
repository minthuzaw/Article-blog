<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Index
     *
     * @group Category
     */
    public function index()
    {
        $category = Category::all();

        return response()->json([
            'status' => 200,
            'data' => [
                'category' => $category,
            ],
        ]);
    }

    /**
     * Store
     *
     * @group Category
     *
     * @bodyParam name string required The name of the category. Example: blog
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|min:2|max:50|string',
        ]);

        $category = Category::create($attributes);

        return response()->json([
            'status' => 200,
            'data' => [
                'message' => 'Category Created Successful',
                'category' => $category,
            ],
        ]);
    }

    /**
     * Update
     *
     * @group Category
     *
     * @bodyParam name string required The name of the category. Example: blog
     */
    public function update(Category $category, Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|min:2|max:50|string',
        ]);

        $category = $category->update($attributes);

        return response()->json([
            'status' => 200,
            'data' => [
                'message' => 'Category Updated Successful',
                'category' => $category,
            ],
        ]);
    }

    /**
     * Destroy
     *
     * @group Category
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json([
            'status' => 200,
            'data' => [
                'message' => 'Category Deleted Successful',
            ],
        ]);
    }
}
