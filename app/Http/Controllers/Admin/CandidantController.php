<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCandidantRequest;
use App\Http\Requests\UpdateCandidantRequest;
use App\Models\Candidant;

class CandidantController extends Controller
{
    public function index()
    {
        $candidants = Candidant::with('vacancy')->get();
        return view('admin.candidants.index', compact('candidants'));
    }
}
