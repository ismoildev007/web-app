<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    // Yangi kategoriya yaratish formasi
    public function create()
    {
        return view('admin.categories.create');
    }

    // Yangi kategoriya saqlash
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'day' => 'nullable|integer',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Kategoriya muvaffaqiyatli yaratildi!');
    }

    // Kategoriya tahrirlash formasi
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // Kategoriya yangilash
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'icon' => 'nullable|string|max:255',
            'day' => 'nullable|integer',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Kategoriya yangilandi!');
    }

    // Kategoriya o'chirish
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Kategoriya o‘chirildi!');
    }
}
