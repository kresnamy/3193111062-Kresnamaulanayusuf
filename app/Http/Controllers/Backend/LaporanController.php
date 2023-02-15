<?php

namespace App\Http\Controllers\Backend;

use App\Models\Pembelian;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Feature\OrderDetail;
use App\Models\Master\Product;
use App\Models\Retur;

class LaporanController extends Controller
{
    public function pembelian()
    {
        $data['pembelian'] = Pembelian::all();
        return view('backend.laporan.pembelian', compact('data'));
    }

    public function pembelian_cetak()
    {
        $data['pembelian'] = Pembelian::all();
        return view('backend.laporan.cetak-pembelian', compact('data'));
    }

    public function penjualan()
    {
        $data['penjualan'] = OrderDetail::all();
        return view('backend.laporan.penjualan', compact('data'));
    }

    public function penjualan_cetak()
    {
        $data['penjualan'] = OrderDetail::all();
        return view('backend.laporan.cetak-penjualan', compact('data'));
    }

    public function produk()
    {
        $data['produk'] = Product::all();
        return view('backend.laporan.produk', compact('data'));
    }

    public function produk_cetak()
    {
        $data['produk'] = Product::all();
        return view('backend.laporan.cetak-produk', compact('data'));
    }

    public function retur()
    {
        $data['retur'] = Retur::where('status', '!=', 'pending')->get();
        return view('backend.laporan.retur', compact('data'));
    }

    public function retur_cetak()
    {
        $data['retur'] = Retur::where('status', '!=', 'pending')->get();
        return view('backend.laporan.cetak-retur', compact('data'));
    }
}
