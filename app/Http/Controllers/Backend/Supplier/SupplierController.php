<?php

namespace App\Http\Controllers\Backend\Supplier;

use App\Http\Controllers\Controller;
use App\Models\Master\Product;
use App\Models\supplier;
use App\Models\Pembelian;
use App\Repositories\CrudRepositories;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    protected $supplier;
    public function __construct(supplier $supplier, Product $product, Pembelian $pembelian)
    {
        $this->supplier = new CrudRepositories($supplier);
        $this->pembelian = new CrudRepositories($pembelian);
        $this->product = new CrudRepositories($product);
    }

    public function index()
    {
        $data['supplier'] = supplier::all();
        return view('backend.supplier.index', compact('data'));
    }

    public function create()
    {
        $data['product'] = Product::all();
        return view('backend.supplier.create', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $this->supplier->store($data, false);
        return redirect()->route('supplier.index')->with('success', __('message.store'));
    }

    public function order($id)
    {
        $data['supplier'] = $this->supplier->find($id);
        $data['produk'] = $this->product->get();
        return view('backend.supplier.order', compact('data'));
    }

    public function orderStore(Request $request)
    {
        $data = $request->except('_token');
        $this->pembelian->store($data, false);
        $produk = $this->product->find($data['product_id']);
        $produk->stock = $produk->stock + $data['stock'];
        $produk->save();
        return redirect()->route('supplier.index')->with('success', __('message.store'));
    }

    public function listOrder()
    {
        $data['pembelian'] = $this->pembelian->get();
        return view('backend.supplier.pembelian', compact('data'));
    }
}
