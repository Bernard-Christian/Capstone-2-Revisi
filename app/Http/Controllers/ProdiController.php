<?php

namespace App\Http\Controllers;

use App\Models\JenisBeasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('prodi.index',[
            'ps' => Prodi::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prodi.create',[
            'ps' => Prodi::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_prodi' => 'required|int',
            'prodi' => 'required|string',
        ]);
        $prodi = new Prodi($validatedData);
        $prodi->save();
        return redirect()->route('prodi-list');
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
        $ps = Prodi::findOrFail($id);
        return view('prodi.edit', [
            'ps' => $ps,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData  = $request->validate([
            'id_prodi' => 'required|int',
            'prodi' => 'required|string',
        ]);
        $prodi = Prodi::findOrFail($id);
        $prodi->update($validatedData);
        return redirect()->route('prodi-list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();
        return redirect()->back();
    }
}
