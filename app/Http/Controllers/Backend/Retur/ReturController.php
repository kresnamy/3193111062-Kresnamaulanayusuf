<?php

namespace App\Http\Controllers\Backend\Retur;

use App\Http\Controllers\Controller;
use App\Models\Retur;
use Illuminate\Http\Request;

class ReturController extends Controller
{
    public function index()
    {
        $data['retur'] = Retur::where('status', 'pending')->get();
        return view('backend.retur.index', compact('data'));
    }

    public function accepted()
    {
        $data['retur'] = Retur::where('status', 'accepted')->get();
        return view('backend.retur.accepted', compact('data'));
    }

    public function denied()
    {
        $data['retur'] = Retur::where('status', 'canceled')->get();
        return view('backend.retur.denied', compact('data'));
    }

    public function accept($id)
    {
        $retur = Retur::find($id);
        $retur->status = 'accepted';
        $retur->save();
        return redirect()->route('retur.index');
    }

    public function deny($id)
    {
        $retur = Retur::find($id);
        $retur->status = 'canceled';
        $retur->save();
        return redirect()->route('retur.index');
    }
}
