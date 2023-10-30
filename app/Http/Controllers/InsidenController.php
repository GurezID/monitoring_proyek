<?php

namespace App\Http\Controllers;

use App\Models\Insiden;
use App\Models\Image;
use App\Http\Requests\StoreInsidenRequest;
use App\Http\Requests\UpdateInsidenRequest;
use Faker\Provider\Lorem;

class InsidenController extends Controller
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
    public function store(StoreInsidenRequest $request)
    {
        $data = $request->validate([
            'laporan_id' => 'required|numeric',
            'judul' => 'required|max:255',
            'detail' => '',
        ]);

        $insiden = Insiden::create($data);

        for ($i = 1; $i <= 5; $i++) {
            if ($request->hasFile('img' . $i)) {
                $uploadedFile = $request->file('img' . $i);

                if ($uploadedFile->isValid()) {
                    $imgPath = $uploadedFile->store('img/insiden');
                    Image::create([
                        'img' => $imgPath,
                        'insiden_id' => $insiden->id,
                    ]);
                }
            }
        }

        

        toastr()->success('Berhasil Buat Insiden', 'Sukses');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Insiden $insiden)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Insiden $insiden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInsidenRequest $request, Insiden $insiden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Insiden $insiden)
    {
        //
    }
}
