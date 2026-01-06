<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Barangpinjam;
use Illuminate\Support\Facades\Auth;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class PeminjamanController extends Controller
{

    public function index()
    {
        $userId = Auth::id();
        $peminjamans = Barangpinjam::with(['barangs'])
            ->where('users_id', $userId)
            ->latest()
            ->get();

        return view('user.peminjaman.index', compact('peminjamans'));
    }
    
    public function create(Barang $barang)
    {
        return view('user.peminjaman.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'barangs_id' => ['required', 'exists:barangs,id'],
            'tanggal_pinjam' => ['required', 'date'],
            'tanggal_pengembalian' => ['required', 'date', 'after_or_equal:tanggal_pinjam'],
            'kategori_pinjam' => ['required', 'string', 'max:50'],
            'tujuan_pinjam' => ['required', 'string', 'max:255'],
            'keterangan_pinjam' => ['nullable', 'string'],
            'dokumen_pendukung' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:2048'],
        ]);

        // ambil user dari auth (jangan percaya hidden users_id)
        $userId = auth()->id();

        // pastikan barang ready
        $barang = Barang::findOrFail($validated['barangs_id']);
        if ($barang->status_barang !== 'ready') {
            return back()->withInput()->with('error', 'Barang tidak tersedia untuk dipinjam (status bukan ready).');
        }

        // upload file (kalau ada)
        $fileName = null;
        if ($request->hasFile('dokumen_pendukung')) {
            $file = $request->file('dokumen_pendukung');
            $fileName = time().'_'.Str::random(8).'.'.$file->getClientOriginalExtension();
            $file->storeAs('dokumen_pendukung', $fileName, 'public');
        }

        // simpan peminjaman
        Barangpinjam::create([
            // kalau id kamu string/custom, isi di sini. kalau auto increment, hapus id.
            // 'id' => (string) Str::uuid(),
            'barangs_id' => $validated['barangs_id'],
            'users_id' => $userId,
            'tanggal_pinjam' => $validated['tanggal_pinjam'],
            'tanggal_pengembalian' => $validated['tanggal_pengembalian'],
            'kategori_pinjam' => $validated['kategori_pinjam'],
            'tujuan_pinjam' => $validated['tujuan_pinjam'],
            'keterangan_pinjam' => $validated['keterangan_pinjam'] ?? null,
            'dokumen_pendukung' => $fileName,
            'status_pinjam' => 'diajukan',
        ]);

        // opsional: set barang jadi not-ready supaya tidak dipinjam ganda
        $barang->update(['status_barang' => 'not-ready']);

        return redirect()
            ->route('user.peminjaman.index')
            ->with('success', 'Permohonan peminjaman berhasil diajukan.');
    }
}