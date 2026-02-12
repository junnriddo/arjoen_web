<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::simplePaginate(2);
           return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('barang.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
            $request->validate([
            // 'kode_barang'=>'required|integer',
            'nama_barang'=>'required|string|max:50',
            'harga_barang'=>'required|integer',

        ]);
        Barang::create([
            // 'kode_barang'=>$request->kode_barang,
            'nama_barang'=>$request->nama_barang,
            'harga_barang'=>$request->harga_barang,
        ]);
        return redirect()->route('barang.index')->with('success', 'barang berhasil ditambahkan.');

    }

    /**
     * Show the form for editing the specified resource.
     */
     public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view ('barang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
      public function update(Request $request, $id)
    {
        $request->validate([
            // 'kode_barang' => 'required|integer',
            'nama_barang' => 'required|string|max:50',
            'harga_barang' => 'required|integer',
        ]);
        $barang = Barang::findOrFail($id);
        $barang->update([
            //  'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'harga_barang' => $request->harga_barang,
        ]);
        return redirect()->route('barang.index')->with('success', 'barang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $barang = Barang::findOrFail($id);
        $barang->delete();
        
        return redirect()->route('barang.index')->with('success', 'barang berhasil dihapus.');
    }
}
