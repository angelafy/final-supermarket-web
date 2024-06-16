<?php


namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Keranjang;
use App\Models\Produk;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class SupermarketController extends Controller
{
    public function index()
    {
        $ingfo_sakkarepmu = 'Tambah Kategori';
        $produks = Produk::paginate(10); // Paginate the products, 10 per page
        $userId = Auth::id(); // Dapatkan ID pengguna yang sedang masuk
        $keranjang = Keranjang::where('user_id', $userId)->get();
        $jumlahProdukKeranjang = $keranjang->count();
        $kategoris = Kategori::all()->filter(function ($kategori) {
            return !is_null($kategori);
        });

        // Log data untuk debugging
        \Log::info('Produks: ' . $produks);
        \Log::info('Kategoris: ' . $kategoris);

        return view('supermarket.index', [
            'ingfo_sakkarepmu' => $ingfo_sakkarepmu,
            'produks' => $produks,
            'kategoris' => $kategoris,
            'jumlahProdukKeranjang' => $jumlahProdukKeranjang,
        ]);
    }

    public function filterProduk(Request $request)
    {
        $kategoriIds = $request->input('kategori_id');

        if ($kategoriIds) {
            $produk = Produk::whereIn('kategori_id', $kategoriIds)->paginate(10); // Paginate the filtered products
        } else {
            $produk = Produk::paginate(10); // Paginate all products
        }

        $kategoris = Kategori::all();

        return view('supermarket.index', [
            'ingfo_sakkarepmu' => 'Hasil Filter',
            'produks' => $produk,
            'kategoris' => $kategoris,
        ]);
    }
}
