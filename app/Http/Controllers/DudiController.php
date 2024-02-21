<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Dudi;
use Illuminate\Http\Request;

class DudiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dudis = Dudi::latest()->paginate(10);

        return view('dudi.index', compact('dudis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dudi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //validate form
       $this->validate($request, [

        'nama'   => 'required',
        'alamat'   => 'required',
    ]);


    //create siswa
    Dudi::create([
        'nama'   => $request->input('nama'),
        'alamat'   => $request->input('alamat'),
    ]);

    //redirect to index
    return redirect()->route('dudi.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
    public function edit(Dudi $dudi)
    {
        return view('dudi.edit', compact('dudi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Dudi $dudi)
    {
        //validate form
        $this->validate($request, [

            'nama'     => 'required',
            'alamat'   => 'required'

        ]);
        $dudi->update([
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat'),
        ]);

        //redirect to index
        return redirect()->route('dudi.index')->with(['success' => 'Berhasil melakukan update data']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dudi $dudi)
    {
        $dudi->delete();
        //redirect to index
        return redirect()->route('dudi.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
