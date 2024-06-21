<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use Illuminate\Http\Request;

class BeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('beasiswa.index',[
            'bs' => Beasiswa::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('beasiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_beasiswa' => 'required|int',
            'periode_awal_beasiswa' => 'required|date',
            'periode_akhir_beasiswa' => 'required|date',
        ]);
        $periodebs = new Beasiswa($validatedData);
        $periodebs->save();
        return redirect()->route('periodebs-list');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bs = Beasiswa::findOrFail($id);
        return view('beasiswa.edit', [
            'bs' => $bs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validatedData  = $request->validate([
            'id_beasiswa' => 'required|int',
            'periode_awal_beasiswa' => 'required|date',
            'periode_akhir_beasiswa' => 'required|date',
        ]);
        $periodebs = Beasiswa::findOrFail($id);
        $periodebs->update($validatedData);
        return redirect()->route('periodebs-list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $periodebs = Beasiswa::findOrFail($id);
        $periodebs->delete();
        return redirect()->back();
    }
}

