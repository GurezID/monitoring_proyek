<?php

namespace App\Http\Controllers;

use App\Models\Rencana;
use Illuminate\Http\Request;

class AdminRencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'proyek_id' => 'required|numeric',
            'pekerjaan' => 'required|max:255|unique:rencanas',
            'alat' => 'max:255',
            'time_str' => 'required',
            'time_end' => 'required',
        ]);


        Rencana::create($data);

        toastr()->success('Berhasil Buat Proyek', 'Sukses');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Rencana $rencana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rencana $rencana)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rencana $rencana)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rencana $rencana)
    {
        //
    }
}
