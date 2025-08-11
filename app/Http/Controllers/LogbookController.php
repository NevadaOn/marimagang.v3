<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logbook;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class LogbookController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $logbooks = Logbook::where('user_id', $user->id)
                    ->orderBy('tanggal', 'asc')
                    ->get();

        return view('logbook.index', compact('logbooks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kegiatan' => 'required|string',
        ]);

        $user = Auth::user();

        Logbook::create([
            'user_id' => $user->id,
            'tanggal' => $request->tanggal,
            'kegiatan' => $request->kegiatan,
        ]);

        return redirect()->route('logbook.index')->with('success', 'Logbook berhasil ditambahkan');
    }

    public function editPage($id)
    {
        $user = Auth::user();

        $logbook = Logbook::where('user_id', $user->id)->findOrFail($id);

        // Pastikan tanggal jadi Carbon instance
        $logbook->tanggal = Carbon::parse($logbook->tanggal);

        return view('logbook.edit', compact('logbook'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'kegiatan' => 'required|string',
        ]);

        $user = Auth::user();

        $logbook = Logbook::where('user_id', $user->id)->findOrFail($id);

        $logbook->update([
            'tanggal' => $request->tanggal,
            'kegiatan' => $request->kegiatan,
        ]);

        return redirect()->route('logbook.index')->with('success', 'Logbook berhasil diperbarui');
    }

    public function destroy($id)
    {
        $user = Auth::user();

        $logbook = Logbook::where('user_id', $user->id)->findOrFail($id);

        $logbook->delete();

        return redirect()->route('logbook.index')->with('success', 'Logbook berhasil dihapus');
    }
}