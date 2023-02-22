<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstansiRequest;
use App\Models\Instansi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Daftar Instansi";
        return view('instansi.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tambah Instansi";
        return view('instansi.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstansiRequest $request)
    {
        $instansi = new Instansi();
        $instansi->nama = $request->nama;
        $instansi->jenis = $request->jenis;
        $instansi->save();
        return redirect()->route('instansi.index')->with('save', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instansi  $instansi
     * @return \Illuminate\Http\Response
     */
    public function show(Instansi $instansi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instansi  $instansi
     * @return \Illuminate\Http\Response
     */
    public function edit($instansi)
    {
        $instansi = Instansi::findOrFail(decrypt($instansi));
        $title = "Daftar Instansi";
        return view('instansi.edit', compact('title', 'instansi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Instansi  $instansi
     * @return \Illuminate\Http\Response
     */
    public function update(InstansiRequest $request, Instansi $instansi)
    {
        $instansi->nama = $request->nama;
        $instansi->jenis = $request->jenis;
        $instansi->save();

        return redirect()->route('instansi.index')->with('save', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instansi  $instansi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instansi $instansi)
    {
        $instansi->delete();
        $result['error'] = false;
        $result['message'] = 'Data kelas berhasil dihapus';
        return response()->json($result, 200);
    }

    public function json()
    {
        $instansi = Instansi::select('id', 'nama', 'jenis');
        return DataTables::of($instansi)
            ->addColumn('no', '')
            ->addColumn('aksi', function (Instansi $instansi) {
                return '<a href="/instansi/' . encrypt($instansi->id) . '/edit"  class="btn btn-xs btn-info waves-effect waves-light">Edit</a> <a href="javascript:void(0);" data-id=' . $instansi->id . ' class="btn btn-xs btn-danger waves-effect waves-light delete">Hapus</a>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}
