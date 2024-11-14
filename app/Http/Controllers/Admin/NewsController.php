<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{

    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }


    public function create()
    {
        return view('admin.news.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'content_uz' => 'nullable|string',
            'content_ru' => 'nullable|string',
            'content_en' => 'nullable|string',
            'date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images', 'public');
        }

        News::create([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'content_uz' => $request->content_uz,
            'content_ru' => $request->content_ru,
            'content_en' => $request->content_en,
            'date' => $request->date,
            'image' => $image,
        ]);

        return redirect()->route('news.index')->with('success', 'Yangilik muvaffaqiyatli yaratildi.');
    }


    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title_uz' => 'required|string|max:255',
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'content_uz' => 'nullable|string',
            'content_ru' => 'nullable|string',
            'content_en' => 'nullable|string',
            'date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $news = News::findOrFail($id);

        $image = $news->image;
        if ($request->hasFile('image')) {
            if ($image) {

                Storage::delete('public/' . $image);
            }
            $image = $request->file('image')->store('images', 'public');
        }

        $news->update([
            'title_uz' => $request->title_uz,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'content_uz' => $request->content_uz,
            'content_ru' => $request->content_ru,
            'content_en' => $request->content_en,
            'date' => $request->date,
            'image' => $image,
        ]);

        return redirect()->route('news.index')->with('success', 'Yangilik muvaffaqiyatli yangilandi.');
    }


    public function destroy($id)
    {
        $news = News::findOrFail($id);
        if ($news->image) {
            Storage::delete('public/' . $news->image);
        }
        $news->delete();

        return redirect()->route('news.index')->with('success', 'Yangilik muvaffaqiyatli o\'chirildi.');
    }
}
