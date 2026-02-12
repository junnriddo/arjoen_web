<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::with('pelanggan')->simplePaginate(2);
        return view('penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        return view('penjualan.create', compact('pelanggans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_pelanggan' => 'required|integer',
            'tanggal_penjualan' => 'required|date',
        ]);

        Penjualan::create([
            'no_pelanggan' => $request->no_pelanggan,
            'tanggal_penjualan' => $request->tanggal_penjualan,
        ]);

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil ditambahkan.');
    }
}