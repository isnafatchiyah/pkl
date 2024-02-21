<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Dudi;
use App\Models\Pkl;
use Illuminate\Http\Request;

class PklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get posts
        $pkls= Pkl::latest()->paginate(5);

        //render view with posts
        return view('pkl.index', compact('pkls'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        $dudi = Dudi::all();
        return view('pkl.create', compact('siswa','dudi'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      //validate form
      $this->validate($request, [

        'id_siswa'   => 'required',
        'id_dudi'   => 'required',
        'tgl_masuk'   => 'required',
    ]);


    //create siswa
    Pkl::create([
        'id_siswa'   => $request->input('id_siswa'),
        'id_dudi'   => $request->input('id_dudi'),
        'tgl_masuk'   => $request->input('tgl_masuk'),


    ]);

    //redirect to index
    return redirect()->route('pkl.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
    public function edit(Pkl $pkl)
    {
        $siswa = Siswa::all();
        $dudi = Dudi::all();
        return view('pkl.edit', compact('pkl','siswa','dudi'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pkl $pkl)
    {
        //validate form
        $this->validate($request, [

            'tgl_keluar'   => 'required',

        ]);
        $pkl->update([
            'tgl_keluar'   => $request->input('tgl_keluar'),

        ]);

        //redirect to index
        return redirect()->route('pkl.index')->with(['success' => 'Berhasil melakukan update data']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pkl $pkl)
    {
        $pkl->delete();
        //redirect to index
        return redirect()->route('pkl.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
