<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\JenisBeasiswa;
use Illuminate\Http\Request;

class JenisBeasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jenis_beasiswa.index',[
            'jbs' => JenisBeasiswa::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis_beasiswa.create',[
            'jbs' => JenisBeasiswa::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'id_jenis_beasiswa' => 'required|int',
            'jenis_beasiswa' => 'required|string',
        ]);
        $jenisbeasiswa = new JenisBeasiswa($validatedData);
        $jenisbeasiswa->save();
        return redirect()->route('jenis_beasiswa-list');
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
        $jbs = JenisBeasiswa::findOrFail($id);
        return view('jenis_beasiswa.edit', [
            'jbs' => $jbs,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData  = $request->validate([
            'id_jenis_beasiswa' => 'required|int',
            'jenis_beasiswa' => 'required|string',
        ]);
        $jenisbeasiswa = JenisBeasiswa::findOrFail($id);
        $jenisbeasiswa->update($validatedData);
        return redirect()->route('jenis_beasiswa-list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenisbeasiswa = JenisBeasiswa::findOrFail($id);
        $jenisbeasiswa->delete();
        return redirect()->back();
    }
}
