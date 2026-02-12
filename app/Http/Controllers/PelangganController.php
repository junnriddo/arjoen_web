<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    //
    public function index()
    {
        $pelanggans = Pelanggan::simplePaginate(2);
           return view('pelanggan.index', compact('pelanggans'));
    }

    public function create()
       {
           return view('pelanggan.create');
       }
    public function store(Request $request)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:50',
            'alamat' => 'required|string|max:100',
        ]);
        Pelanggan::create([
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
        ]);
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan.');
    }

     public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view ('pelanggan.edit', compact('pelanggan'));
    }
     public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pelanggan' => 'required|string|max:50',
            'alamat' => 'required|string|max:100',
        ]);
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
        ]);
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui.');
    }
      public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus.');
    } 
}

