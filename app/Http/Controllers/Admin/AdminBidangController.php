<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Databidang;
use App\Models\Admin;

class AdminBidangController extends Controller
{
    protected $admin;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->admin = auth()->guard('admin')->user();
            return $next($request);
        });
    }

    public function index()
    {
        $bidang = $this->admin->role === 'superadmin'
            ? Databidang::with('admin')->withCount('pengajuan')->get()
            : Databidang::with('admin')->withCount('pengajuan')
                ->where('admin_id', $this->admin->id)
                ->get();

        return view('admin.bidang.index', compact('bidang'));
    }

    public function create()
    {
        $admins = $this->admin->role === 'superadmin'
            ? Admin::where('role', 'admin_bidang')->get()
            : null;

        return view('admin.bidang.create', compact('admins'));
    }

    public function store(Request $request)
    {
        $rules = [
            'nama' => 'required|string|max:255',
            'slug' => 'required|string|unique:databidang,slug',
            'kuota' => 'required|integer|min:1',
            'thumbnail' => 'nullable|string',
            'photo' => 'nullable|string',
            'deskripsi' => 'nullable|string',
            'status' => 'nullable|in:buka,tutup',
        ];

        if ($this->admin->role === 'superadmin') {
            $rules['admin_id'] = 'required|exists:admins,id';
        }

        $validated = $request->validate($rules);

        $adminId = $this->admin->role === 'superadmin'
            ? $validated['admin_id']
            : $this->admin->id;

        Databidang::create([
            'admin_id' => $adminId,
            'nama' => $validated['nama'],
            'slug' => $validated['slug'],
            'thumbnail' => $request->thumbnail ?? null,
            'photo' => $request->photo ?? null,
            'deskripsi' => $request->deskripsi ?? '',
            'status' => $validated['status'] ?? 'buka',
            'kuota' => $validated['kuota'],
            'kuota_terisi' => 0,
        ]);

        return redirect()->route('admin.bidang.index')->with('success', 'Bidang berhasil ditambahkan.');
    }

    public function show($id)
    {
        $bidang = Databidang::with('pengajuan', 'admin')->findOrFail($id);
        $this->authorizeBidang($bidang);

        return view('admin.bidang.show', compact('bidang'));
    }

    public function edit($id)
    {
        $bidang = Databidang::with('admin')->findOrFail($id);
        $this->authorizeBidang($bidang);

        $admins = $this->admin->role === 'superadmin'
            ? Admin::where('role', 'admin_bidang')->get()
            : null;

        return view('admin.bidang.edit', compact('bidang', 'admins'));
    }

    public function update(Request $request, $id)
    {
        $bidang = Databidang::findOrFail($id);
        $this->authorizeBidang($bidang);

        $rules = [
            'nama' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:databidang,slug,' . $id,
            'kuota' => 'required|integer|min:1',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'deskripsi' => 'nullable|string',
            'status' => 'nullable|in:buka,tutup',
        ];

        if ($this->admin->role === 'superadmin') {
            $rules['admin_id'] = 'required|exists:admins,id';
        }

        $validated = $request->validate($rules);

        $thumbnailPath = $bidang->thumbnail;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        $photoPath = $bidang->photo;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
        }

        $bidang->update([
            'admin_id' => $this->admin->role === 'superadmin' ? $validated['admin_id'] : $this->admin->id,
            'nama' => $validated['nama'],
            'slug' => $validated['slug'],
            'kuota' => $validated['kuota'],
            'thumbnail' => $thumbnailPath,
            'photo' => $photoPath,
            'deskripsi' => $validated['deskripsi'] ?? '',
            'status' => $validated['status'] ?? 'buka',
        ]);

        return redirect()->route('admin.bidang.index')->with('success', 'Bidang berhasil diperbarui.');
    }


    public function destroy($id)
    {
        $bidang = Databidang::findOrFail($id);
        $this->authorizeBidang($bidang);

        if ($bidang->pengajuan()->exists()) {
            return redirect()->route('admin.bidang.index')
                ->with('error', 'Bidang tidak dapat dihapus karena masih memiliki pengajuan.');
        }

        $bidang->delete();

        return redirect()->route('admin.bidang.index')->with('success', 'Bidang berhasil dihapus.');
    }

    protected function authorizeBidang(Databidang $bidang)
    {
        if ($this->admin->role !== 'superadmin' && $bidang->admin_id !== $this->admin->id) {
            abort(403, 'Anda tidak berhak mengakses bidang ini.');
        }
    }
}
