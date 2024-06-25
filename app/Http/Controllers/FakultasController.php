<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\JenisBeasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('fakultas.index',[
            'fs' => Fakultas::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fakultas.create',[
            'fs' => Fakultas::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_fakultas' => 'required|int',
            'fakultas' => 'required|string',
        ]);
        $fakultas = new Fakultas($validatedData);
        $fakultas->save();
        return redirect()->route('fakultas-list');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fs = Fakultas::findOrFail($id);
        return view('fakultas.edit', [
            'fs' => $fs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData  = $request->validate([
            'id_fakultas' => 'required|int',
            'fakultas' => 'required|string',
        ]);
        $fakultas = Fakultas::findOrFail($id);
        $fakultas->update($validatedData);
        return redirect()->route('fakultas-list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $fakultas = Fakultas::findOrFail($id);
        $fakultas->delete();
        return redirect()->back();
    }
}
