<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\BeasiswaDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function Laravel\Prompts\alert;
use Illuminate\Support\Facades\Log;

class BeasiswaDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Beasiswa $beasiswa
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function index()
    {
        return view('beasiswa_detail.index',[
            'bds' => BeasiswaDetail::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('beasiswa_detail.create', [
            'users' => User::all(),
            'bs' => Beasiswa::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData  = validator($request->all(), [
            'id_beasiswa_detail' => 'required|int',
            'users_id' => 'required',
            'beasiswa_id_beasiswa' => 'required',
            'jenis_beasiswa' => 'required|string',
            'dokumen_beasiswa' => 'mimes:pdf|max:10000'
        ])->validate();


        $path = $request->file('dokumen_beasiswa')->store('dokumen', 'public');
        $beasiswa = new BeasiswaDetail($validatedData);
        $beasiswa->dokumen_beasiswa = $path;
        $beasiswa -> save();
        return redirect()->route('beasiswa_detail-list');
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
        $beasiswa = BeasiswaDetail::findOrFail($id);
        return view('beasiswa_detail.edit', [
            'beasiswa' => $beasiswa,
            'users' => User::all(),
            'bs' => Beasiswa::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData  = $request->validate([
            'id_beasiswa_detail' => 'required|int',
            'users_id' => '',
            'beasiswa_id_beasiswa' => 'required',
            'jenis_beasiswa' => 'required|string',
        ]);
        $beasiswa = BeasiswaDetail::findOrFail($id);
        $beasiswa ->update($validatedData);
        return redirect()->route('beasiswa_detail-list');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $beasiswa = BeasiswaDetail::findOrFail($id);
        $beasiswa->delete();
        return redirect()->back();
    }
}
