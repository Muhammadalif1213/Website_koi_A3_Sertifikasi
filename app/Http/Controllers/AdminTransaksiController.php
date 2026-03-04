<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class AdminTransaksiController extends Controller
{
    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak. Halaman ini hanya untuk admin.');
        }

        $orders = Transaksi::with('produk', 'user')
            ->whereIn('status', ['dibatalkan', 'selesai', 'dikirimkan']) // ✅ hanya status tertentu
            ->select('id', 'kode_produk', 'qty', 'total_harga', 'status', 'bukti_transaksi', 'created_at', 'user_id')
            ->paginate(10);

        return view('adminTransaksi.index', compact('orders'));
    }

    public function showImage($id)
    {
        $order = Transaksi::where('id', $id)->firstOrFail();

        if ($order->bukti_transaksi) {
            // Mengembalikan response dengan data gambar dan header Content-Type yang benar
            return response($order->bukti_transaksi)->header('Content-Type', 'image/jpeg');
        }

        // Jika tidak ada gambar, kembalikan gambar placeholder atau 404
        // Di sini kita kembalikan 404 Not Found
        abort(404);
    }
    public function exportPdf()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Akses ditolak.');
        }

        // Ambil data yang sama, tapi gunakan get() (bukan paginate) agar semua data terambil
        $riwayat = Transaksi::with('produk', 'user')
            ->whereIn('status', ['dibatalkan', 'selesai', 'dikirimkan'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Load view khusus PDF (kita buat di langkah 4)
        $pdf = Pdf::loadView('adminTransaksi.pdf', compact('riwayat'));
        
        // Atur ukuran kertas (A4 Landscape biasanya lebih muat tabel lebar)
        $pdf->setPaper('a4', 'landscape');

        // Download file
        return $pdf->download('laporan-riwayat-transaksi.pdf');
    }
}