<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\BarangPinjam;

class DashboardController extends Controller
{
    public function index()
    {
        $barangCount = Barang::count();
        $userCount   = User::count();

        // ambil 5 data peminjaman terakhir untuk ditampilkan di dashboard
        $loans = BarangPinjam::with(['users','barangs'])
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', [
            'totalBarang' => Barang::count(),
            'totalDipinjam' => 0, // sementara
            'totalUser' => User::count(),
            'loans'         => $loans,
        ]);
    }
}
