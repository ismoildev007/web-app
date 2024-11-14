<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVacancyRequest;
use App\Http\Requests\UpdateVacancyRequest;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{

    public function index()
    {
        $vacancies = Vacancy::all();
        return view('admin.vacancies.index', compact('vacancies'));
    }

    public function create()
    {
        return view('admin.vacancies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_uz' => 'nullable|string',
            'name_ru' => 'nullable|string',
            'name_en' => 'nullable|string',
            'title_uz' => 'nullable|string',
            'title_ru' => 'nullable|string',
            'title_en' => 'nullable|string',
            'content_uz' => 'nullable|string',
            'content_ru' => 'nullable|string',
            'content_en' => 'nullable|string',
            'image' => 'nullable|string',
            'date' => 'nullable|date',
            'status' => 'nullable|string',
        ]);

        Vacancy::create($request->all());

        return redirect()->route('vacancies.index')->with('success', 'Vakansiya muvaffaqiyatli qo\'shildi.');
    }

    public function edit($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        return view('admin.vacancies.edit', compact('vacancy'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_uz' => 'nullable|string',
            'name_ru' => 'nullable|string',
            'name_en' => 'nullable|string',
            'title_uz' => 'nullable|string',
            'title_ru' => 'nullable|string',
            'title_en' => 'nullable|string',
            'content_uz' => 'nullable|string',
            'content_ru' => 'nullable|string',
            'content_en' => 'nullable|string',
            'image' => 'nullable|string',
            'date' => 'nullable|date',
            'status' => 'nullable|string',
        ]);

        $vacancy = Vacancy::findOrFail($id);
        $vacancy->update($request->all());

        return redirect()->route('vacancies.index')->with('success', 'Vakansiya muvaffaqiyatli yangilandi.');
    }
    public function destroy($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->delete();

        return redirect()->route('vacancies.index')->with('success', 'Vakansiya muvaffaqiyatli o\'chirildi.');
    }
}
