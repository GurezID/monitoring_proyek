<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use App\Models\User;
use Illuminate\Http\Request;

class AdminProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    
    public function create()
    {
        $user = User::where('role', false)->get();
        $pengawas = User::where('role', 2)->get();
        $manager = User::where('role', 3)->get();

        return view('administrator.proyek.index', [
            "title" => "PROYEK",
            "link" => "/administrator/proyek/create",
            "subTitle" => null,
            "klien" => $user,
            "pengawas" => $pengawas,
            "manager" => $manager,
            "proyeks" => Proyek::latest()->paginate()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
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

    /**
     * Display the specified resource.
     */
    public function show(Proyek $proyek)
    {
        $user = User::where('role', false)->get();
        $pengawas = User::where('role', 2)->get();
        $manager = User::where('role', 3)->get();

        return view('administrator.proyek.detail', [
            "title" => "PROYEK",
            "link" => "/administrator/proyek/create",
            "subTitle" => "DETAIL",
            "klien" => $user,
            "pengawas" => $pengawas,
            "manager" => $manager,
            "proyek" => $proyek
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proyek $proyek)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proyek $proyek)
    {
        $data = $request->validate([
            'name_proyek' => 'required|max:255|unique:proyeks,name_proyek,' . $proyek->id,
            'klien' => 'required|max:255',
            'pengawas' => 'required',
            'manager' => 'required|max:255',
            'time_str' => 'required',
            'time_end' => 'required',
        ]);

        $proyek->update($data);

        toastr()->success('Berhasil Update Proyek', 'Sukses');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $proyek = Proyek::find($id);

        Proyek::destroy($proyek->id);

        toastr()->success('Berhasil Menghapus Proyek', 'Sukses');
        return redirect()->back();
    }
}
