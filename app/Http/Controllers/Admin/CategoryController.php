<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function __construct()
    {
        if (!Auth::check() || !in_array(Auth::user()->role, [1, 2])) {
            abort(403, 'Ushbu sahifaga kirish ruxsati yo‘q.');
        }
    }
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'day' => 'nullable|string|max:255',
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('categories', 'public');
        }

        Category::create([
            'name' => $request->name,
            'day' => $request->day,
            'image' => $image,
        ]);
        return redirect()->route('categories.index')->with('success', 'Kategoriya muvaffaqiyatli yaratildi!');
    }

    // Kategoriya tahrirlash formasi
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    // Kategoriya yangilash
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp,svg|max:2048',
            'day' => 'nullable|string|max:255',
        ]);
        $category = Category::findOrFail($id);

        $image = $category->image;
        if ($request->hasFile('image')) {
            if ($image) {
                Storage::delete('public/' . $image);
            }
            $image = $request->file('image')->store('categories', 'public');
        }

        $category->update([
            'name' => $request->name,
            'day' => $request->day,
            'image' => $image,
        ]);
        return redirect()->route('categories.index')->with('success', 'Kategoriya yangilandi!');
    }

    // Kategoriya o'chirish
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Kategoriya o‘chirildi!');
    }
}
