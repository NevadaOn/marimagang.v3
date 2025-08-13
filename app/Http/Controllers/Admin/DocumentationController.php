<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Documentation;
use App\Models\DocumentationImage;
use Illuminate\Support\Facades\Storage;

class DocumentationController extends Controller
{
    public function index()
    {
        $documentations = Documentation::with('images')->latest()->get();
        return view('admin.documentation.index', compact('documentations'));
    }
public function indexdinas()
    {
        $documentations = Documentation::with('images')->latest()->get();
        return view('admin.documentation.indexdinas', compact('documentations'));
    }

    public function create()
    {
        return view('admin.documentation.create');
    }
public function createdinas()
    {
        return view('admin.documentation.createdinas');
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul_kegiatan' => 'nullable|string|max:255',
            'judul_project' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'images.*' => 'required|image|max:2048',
            'captions.*' => 'nullable|string|max:255',
        ]);

        $documentation = Documentation::create($request->only('judul_kegiatan', 'judul_project', 'deskripsi'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('dokumentasi', 'public');
                DocumentationImage::create([
                    'documentation_id' => $documentation->id,
                    'image_path' => $path,
                    'caption' => $request->captions[$index] ?? null,
                ]);
            }
        }

        return redirect()->route('admin.documentation.index')->with('success', 'Dokumentasi berhasil disimpan.');
    }

      public function storedinas(Request $request)
    {
        $request->validate([
            'judul_kegiatan' => 'nullable|string|max:255',
            'judul_project' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'images.*' => 'required|image|max:2048',
            'captions.*' => 'nullable|string|max:255',
        ]);

        $documentation = Documentation::create($request->only('judul_kegiatan', 'judul_project', 'deskripsi'));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('dokumentasi', 'public');
                DocumentationImage::create([
                    'documentation_id' => $documentation->id,
                    'image_path' => $path,
                    'caption' => $request->captions[$index] ?? null,
                ]);
            }
        }

        return redirect()->route('admin.documentation.indexdinas')->with('success', 'Dokumentasi berhasil disimpan.');
    }

    public function show($id)
    {
        $documentation = Documentation::with('images')->findOrFail($id);
        return view('admin.documentation.show', compact('documentation'));
    }

    public function destroy($id)
    {
        $documentation = Documentation::findOrFail($id);
        $documentation->images->each(function ($image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        });
        $documentation->delete();

        return back()->with('success', 'Dokumentasi berhasil dihapus.');
    }
}
