<?php
namespace App\Http\Controllers;

use App\Models\Databidang;

class BidangController extends Controller
{
    public function index()
    {
        $bidangs = Databidang::where('status', 'buka')->get();
        return view('welcome', compact('bidangs'));
    }

    public function show(Databidang $bidang)
    {
        return view('bidang.show', compact('bidang'));
    }
}
