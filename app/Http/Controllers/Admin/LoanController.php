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
            'status_pinjam' => 'required|in:pending,disetujui,ditolak,selesai',
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
            'tanggal_pengembalian' => 'nullable|date|after_or_equal:tanggal_pinjam',
        ]);

        $loan = Barangpinjam::findOrFail($id);
        $loan->status_pinjam = $request->status_pinjam;

        if ($request->filled('tanggal_pengembalian')) {
            $loan->tanggal_pengembalian = $request->tanggal_pengembalian;
        }

        $loan->save();

        return back()->with('success', 'Status peminjaman diperbarui');
    }
}
