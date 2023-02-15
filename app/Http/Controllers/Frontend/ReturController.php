<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Retur;
use Illuminate\Http\Request;
use App\Repositories\CrudRepositories;

class ReturController extends Controller
{
    protected $retur;
    public function __construct()
    {
        $this->retur = new CrudRepositories(new Retur());
    }

    public function index()
    {
        return view('frontend.retur.index');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $this->retur->store($data, true, ['image'], 'retur');
        return redirect()->route('home')->with('success', __('message.store'));
    }
}
