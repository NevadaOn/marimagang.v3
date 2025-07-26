<?php

namespace App\Http\Controllers;

use App\Models\Documentation;
use Illuminate\Http\Request;

class LandingDocumentationController extends Controller
{
    public function index()
    {
        $documentations = Documentation::with('images')->latest()->paginate(6); // bisa diubah jumlah per page
        return view('landing.documentation.index', compact('documentations'));
    }

    public function show($id)
    {
        $documentation = Documentation::with('images')->findOrFail($id);
        return view('landing.documentation.show', compact('documentation'));
    }
}
