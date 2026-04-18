<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
 
class CategoryController extends Controller
{
    // List
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    // Form
    public function create()
    {
        return view('admin.categories.create');
    }

    // Store
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'icon'=>'required',
            'description' => 'nullable'

        ]);

        Category::create([
            'name' => $request->name,
            'icon'=>$request->icon,
            'description' => $request->description
        ]);

        return redirect()->back()->with('success', 'Category Added');
    }

    public function edit($id)
        {
            $category = Category::findOrFail($id);
            return view('admin.categories.edit', compact('category'));
        }

        // Update data
    public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required',
                'icon'=>'required',
                'description' => 'nullable'
            ]);

            $category = Category::findOrFail($id);

            $category->update([
                'name' => $request->name,
                'icon'=>$request->icon,
                'description' => $request->description
            ]);

            return redirect('/admin/categories')->with('success', 'Category Updated');
        }

        public function destroy($id)
        {
            $category = Category::findOrFail($id);
            $category->delete();

            return redirect('/admin/categories')->with('success', 'Category Deleted');
        }

        public function show($id)
        {
            $category = Category::with('jobs')->findOrFail($id);

            return view('categories', compact('category'));
        }
}