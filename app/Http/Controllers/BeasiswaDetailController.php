<?php

namespace App\Http\Controllers;

use App\Models\Beasiswa;
use App\Models\BeasiswaDetail;
use App\Models\JenisBeasiswa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $hasApplied = false;

        if ($user->role == 'mahasiswa') {
            $hasApplied = BeasiswaDetail::where('users_id', $user->id)->exists();
        }

        return view('beasiswa_detail.index',[
            'bds' => BeasiswaDetail::all(),
            'jbs' => JenisBeasiswa::all(),
            'bs' => Beasiswa::all(),
            'hasApplied' => $hasApplied,
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
            'jbs' => JenisBeasiswa::all(),
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
            'dokumen_beasiswa' => 'mimes:pdf|max:10000',
            'jenis_beasiswa' => 'string',
            'ipk' => 'numeric',
            'poin_portofolio' => 'integer',
            'semester' => 'string',
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
            'jbs' => JenisBeasiswa::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData  = $request->validate([
            'id_beasiswa_detail' => 'required|int',
            'users_id' => 'required',
            'beasiswa_id_beasiswa' => 'required',
            'dokumen_beasiswa' => 'mimes:pdf|max:10000',
            'jenis_beasiswa' => 'string',
            'ipk' => 'numeric',
            'poin_portofolio' => 'integer',
            'semester' => 'string',
        ]);

        $beasiswa = BeasiswaDetail::findOrFail($id);
        $path = $request->file('dokumen_beasiswa')->store('dokumen', 'public');
        $beasiswa->dokumen_beasiswa = $path;
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

    public function approveByProdi(string $id)
    {
        $beasiswa = BeasiswaDetail::findOrFail($id);

        $beasiswa->prodi_approved = true;
        $beasiswa->save();

        return redirect()->back()->with('success', 'Beasiswa approved by Prodi successfully.');
    }

    public function approveByFakultas(string $id)
    {
        $beasiswa = BeasiswaDetail::findOrFail($id);

        if (!$beasiswa->prodi_approved) {
            return redirect()->back()->with('alert', 'Beasiswa must be approved by Prodi first.');
        }

        $beasiswa->fakultas_approved = true;
        $beasiswa->save();

        return redirect()->back()->with('success', 'Beasiswa approved by Fakultas successfully.');
    }
}
