<?php

namespace App\Http\Controllers;

use App\Models\Perkara;
use App\Models\Sidang;
use Illuminate\Http\Request;

class PerkaraController extends Controller
{
    public function index()
    {
        return view("perkara.index");
    }

    public function show($id)
    {
        $perkara = Perkara::findOrFail($id);

        return view("perkara.show", compact('perkara'));
    }

    public function search(Request $request)
    {

        $request->validate([
            'no_perkara' => 'required|string|max:255'
        ]);

        $search = trim($request->no_perkara);

        $perkara = Perkara::with([
            'sidang',
            'sidang.hakim',
            'sidang.hakimAnggota1',
            'sidang.hakimAnggota2',
            'sidang.hakimPanitera',
            'sidang.putusan'
        ])->where('no_perkara', $search)->first();

        return view('perkara.index', [
            'perkara' => $perkara,
            'search' => $search
        ]);
    }
}
