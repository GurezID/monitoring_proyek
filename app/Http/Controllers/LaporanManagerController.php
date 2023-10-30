<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Proyek;
use App\Models\Image;
use App\Models\Insiden;
use Illuminate\Http\Request;

class LaporanManagerController extends Controller
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


    public function store(Request $request)
    {
        $data = $request->validate([
            'proyek_id' => 'required|numeric',
            'pekerjaan' => 'required|max:255',
            'detail' => '',
        ]);

        $laporan = Laporan::create($data);

        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile('img' . $i)) {
                $uploadedFile = $request->file('img' . $i);

                if ($uploadedFile->isValid()) {
                    $imgPath = $uploadedFile->store('img/laporan');
                    Image::create([
                        'img' => $imgPath,
                        'laporan_id' => $laporan->id,
                    ]);
                }
            }
        }

        toastr()->success('Berhasil Buat Laporan', 'Sukses');
        return redirect()->back();
    }



    /**
     * Display the specified resource.
     */
    public function show(Laporan $laporan)
    {
        $proyek = Proyek::where('id', $laporan->proyek_id)->first();

        return view('manager.proyek.detail_laporan', [
            "title" => "DETAIL PROYEK",
            "link" => "url()->previous()",
            "subTitle" => "DETAIL LAPORAN",
            "proyek" => $proyek,
            "laporan" => $laporan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laporan $laporan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laporan $laporan)
    {
        //
    }
}
