<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Livewire\Admin\Category\CategoryFilter;
use App\Events\CategoryDeleting;

class CategoryController extends Controller
{

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }
    public function confirmDelete(Category $category)
    {
        $defaultCategories = Category::where('id', '!=', $category->id)->get();
        return view('admin.category_product.confirm-delete', compact('category', 'defaultCategories'));
    }
    public function destroy(Request $request, Category $category)
    {
        $defaultCategoryId = $request->input('default_category_id');
        $action = $request->input('action');

        if ($action && in_array($action, ['delete', 'move'])) {
            event(new CategoryDeleting($category, $action, $defaultCategoryId));
            return redirect()->route('admin.categories.index')->with('success', 'Category handled successfully.');
        }

        return view('admin.categories.confirm-delete', compact('category'));
    }
}
