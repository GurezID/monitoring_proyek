<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\User;
use App\Http\Requests\StoreProyekRequest;
use App\Http\Requests\UpdateProyekRequest;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $user = auth()->user()->name;

        $proyek = Proyek::where('manager', $user)->get();

        return view('manager.proyek.proyek', [
            "title" => "PROYEK",
            "link" => "/manager/proyek",
            "subTitle" => null,
            "proyeks" => $proyek,
            "users" => User::where('role', 3)->get()
        ]);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProyekRequest $request)
    {
        $data = $request->validate([
            'klien' => 'required|max:255',
            'name_proyek' => 'required|max:255|unique:proyeks',
            'pengawas' => 'required',
            'manager' => 'required|max:255',
            'time_str' => 'required',
            'time_end' => 'required',
        ]);


        Proyek::create($data);

        toastr()->success('Berhasil Buat Proyek', 'Sukses');
        return redirect()->back();
    }

    public function show($name)
    {
        $proyek = Proyek::where('manager', $name)->get();

        return view('manager.proyek.proyek', [
            "title" => "PROYEK",
            "link" => "/manager/proyek",
            "subTitle" => null,
            "proyeks" => $proyek,
            "users" => User::where('role', 3)->get()
        ]);
    }


    public function edit(Proyek $proyek)
    {
        return view('manager.proyek.detail', [
            "title" => "PROYEK",
            "link" => "/manager/proyek",
            "subTitle" => "DETAIL",
            "proyek" => $proyek
        ]);
    }

    public function update(UpdateProyekRequest $request, Proyek $proyek)
    {
        //
    }


    public function destroy($id)
    {
        $proyek = Proyek::find($id);

        Proyek::destroy($proyek->id);

        toastr()->success('Berhasil Menghapus Proyek', 'Sukses');
        return redirect()->back();
    }
}
