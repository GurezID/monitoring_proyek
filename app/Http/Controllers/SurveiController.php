<?php

namespace App\Http\Controllers;

use App\Models\Survei;
use App\Models\Image;
use App\Http\Requests\StoreSurveiRequest;
use App\Http\Requests\UpdateSurveiRequest;

class SurveiController extends Controller
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
    public function store(StoreSurveiRequest $request)
    {
        $data = $request->validate([
            'laporan_id' => 'required|numeric',
            'judul' => 'required|max:255',
            'detail' => '',
        ]);

        $survei = Survei::create($data);

        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile('img' . $i)) {
                $uploadedFile = $request->file('img' . $i);

                if ($uploadedFile->isValid()) {
                    $imgPath = $uploadedFile->store('img/survei');
                    Image::create([
                        'img' => $imgPath,
                        'survei_id' => $survei->id,
                    ]);
                }
            }
        }

        

        toastr()->success('Berhasil Buat Survei', 'Sukses');
        return redirect()->back();
    }


    public function show(Survei $survei)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Survei $survei)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSurveiRequest $request, Survei $survei)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Survei $survei)
    {
        //
    }
}
