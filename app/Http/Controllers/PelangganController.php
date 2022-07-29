<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact('pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pelanggan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:pelanggans|max:255',
            'no_telepon' => 'required|unique:pelanggans|max:255',
            'alamat' => 'required',
            'password' => 'required',
        ]);

        $pelanggan = new Pelanggan();
        $pelanggan->nama = $request->nama;
        $pelanggan->email = $request->email;
        $pelanggan->no_telepon = $request->no_telepon;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->password = $request->password;
        $pelanggan->save();
        return redirect()->route('pelanggan.index')
            ->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.show', compact('pelanggan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.edit', compact('pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validasi
        $validated = $request->validate([
            'nama' => 'required',
            'email' => 'required|unique:pelanggans|max:255',
            'no_telepon' => 'required|unique:pelanggans|max:255',
            'alamat' => 'required',
            'password' => 'required',
        ]);

        $pelanggan = new Pelanggan();
        $pelanggan->nama = $request->nama;
        $pelanggan->email = $request->email;
        $pelanggan->no_telepon = $request->no_telepon;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->password = $request->password;
        $pelanggan->save();
        return redirect()->route('pelanggan.index')
            ->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')
            ->with('success', 'Data berhasil dihapus!');
    }
}
