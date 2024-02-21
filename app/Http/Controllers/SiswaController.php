<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get posts
        $siswas = Siswa::latest()->paginate(5);

        //render view with posts
        return view('siswa.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       //validate form
       $this->validate($request, [

        'nama'   => 'required',
        'kelas'   => 'required',
    ]);


    //create siswa
    Siswa::create([
        'nama'   => $request->input('nama'),
        'kelas'   => $request->input('kelas'),
    ]);

    //redirect to index
    return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
    public function edit(Siswa $siswa)
    {
        return view('siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
         //validate form
         $this->validate($request, [

            'nama'     => 'required',
            'kelas'   => 'required'

        ]);
        $siswa->update([
            'nama' => $request->input('nama'),
            'kelas' => $request->input('kelas'),
        ]);

        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Berhasil melakukan update data']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();
        //redirect to index
        return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
