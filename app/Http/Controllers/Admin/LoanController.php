<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barangpinjam;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $peminjamans = Barangpinjam::with(['users', 'barangs'])
            ->latest()
            ->get();

        return view('admin.loans.index', compact('peminjamans'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_pinjam' => 'required|in:diajukan,disetujui,ditolak,dikembalikan,dipinjam',
        ]);

        $pinjam = Barangpinjam::findOrFail($id);

        $pinjam->update([
            'status_pinjam' => $request->status_pinjam,
        ]);

        return back()->with('success', 'Status peminjaman diperbarui');
    }

    public function verify(Request $request, $id)
    {
        $request->validate([
            'status_pinjam' => 'required|in:disetujui,ditolak',
            'tanggal_pengembalian' => 'nullable|date',
        ]);

        $loan = Barangpinjam::findOrFail($id);

        $loan->update([
            'status_pinjam' => $request->status_pinjam,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
        ]);

        return redirect()
            ->route('admin.loans.show', $loan->id)
            ->with('success', 'Peminjaman berhasil diverifikasi');
    }

    public function show(Barangpinjam $loan)
    {
        return view('admin.loans.show', compact('loan'));
    }
}
