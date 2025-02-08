<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class rekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekenings = Rekening::all();
        return view('rekening.index', compact('rekenings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rekening.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'noRekening' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $rekening = new Rekening; // kalo di bagian update Rekening::find($id)
        $rekening->namaRekening = $request->nama;
        $rekening->saldoAwal = null;
        $rekening->noRekening = $request->noRekening;
        $rekening->save();

        return redirect()->route('rekening.index')->with('success', 'Rekening berhasil ditambahkan!');
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
    public function edit(string $id)
    {
        $rekening = Rekening::findOrFail($id);

        return view('rekening.edit', compact('rekening'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     // tambah routing
    //     // di controller nerima id, find data dengan id
    //     // update data yang dibutuhkan
    //     // save data
    //     // return redirect ke halaman index


    //     // controller -> file blade -> routing
    //     // file blade -> controller -> routing
    // }
    public function update(Request $request, $id)
    {
        $request->validate([
            'namaRekening' => 'required',
            'noRekening' => 'required|numeric'
        ]);

        // Cari rekening berdasarkan ID
        $rekening = Rekening::findOrFail($id);

        // Update data
        $rekening->update([
            'namaRekening' => $request->namaRekening,
            'noRekening' => $request->noRekening,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('rekening.index')->with('success', 'Rekening berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Rekening::destroy($id);
        $rekening = Rekening::find($id);
        $rekening->delete();
        return redirect()->route('rekening.index')->with('success', 'Rekening berhasil dihapus!');
    }
}
