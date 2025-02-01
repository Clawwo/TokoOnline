<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProdukController extends Controller
{
    function tampil_produk()
    {
        $produk = Produk::all();
        return view('produk', compact('produk'));
    }

    function hapusProduk(Request $request)
    {
        $produk_id = $request->input('id_produk');
        $brg = Produk::where('id_produk', $produk_id)->first();

        if ($brg) {
            $path = public_path('/foto_produk');
            $foto = $brg->foto_produk;

            // Hapus record dari database
            $brg->delete();

            // Hapus file foto dari direktori jika ada
            if (File::exists($path . '/' . $foto)) {
                File::delete($path . '/' . $foto);
            }

            return redirect('produk')->with('status', 'Data Berhasil Dihapus');
        } else {
            return redirect('produk')->with('status', 'Data Tidak Ditemukan');
        }
    }
}
