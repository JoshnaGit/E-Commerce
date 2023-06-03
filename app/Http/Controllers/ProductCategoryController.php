<?php

namespace App\Http\Controllers;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::all();
        return view('product-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('product-categories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:product_categories',
        ]);

        ProductCategory::create($validatedData);

        return redirect()->route('product-categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit(ProductCategory $category)
    {
        return view('product-categories.edit', compact('category'));
    }

    public function update(Request $request, ProductCategory $category)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:product_categories,name,' . $category->id,
        ]);

        $category->update($validatedData);

        return redirect()->route('product-categories.index')
            ->with('success', 'Category updated successfully.');
    }

    public function destroy(ProductCategory $category)
    {
        $category->delete();

        return redirect()->route('product-categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
