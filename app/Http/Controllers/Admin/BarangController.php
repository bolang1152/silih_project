<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::all();
        return view('admin.barang', compact('barangs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|unique:barangs',
            'nama_barang' => 'required',
            'jumlah_barang' => 'required|integer',
            'kondisi_barang' => 'required',
            'detail_barang' => 'required',
            'status_barang' => 'required',
            'gambar_barang' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->except('gambar_barang');

        // upload gambar
        if ($request->hasFile('gambar_barang')) {
            $data['gambar_barang'] = $request
                ->file('gambar_barang')
                ->store('barang', 'public');
        }

        Barang::create($data);

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.barang-edit', compact('barang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required',
            'jumlah_barang' => 'required|integer',
            'kondisi_barang' => 'required',
            'detail_barang' => 'required',
            'status_barang' => 'required',
            'gambar_barang' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $barang = Barang::findOrFail($id);
        $data = $request->except('gambar_barang');

        // ganti gambar jika upload baru
        if ($request->hasFile('gambar_barang')) {

            // hapus gambar lama
            if ($barang->gambar_barang) {
                Storage::disk('public')->delete($barang->gambar_barang);
            }

            $data['gambar_barang'] = $request
                ->file('gambar_barang')
                ->store('barang', 'public');
        }

        $barang->update($data);

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil diupdate');
    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);

        // hapus file gambar
        if ($barang->gambar_barang) {
            Storage::disk('public')->delete($barang->gambar_barang);
        }

        $barang->delete();

        return redirect()->route('barang.index')
            ->with('success', 'Barang berhasil dihapus');
    }
}
