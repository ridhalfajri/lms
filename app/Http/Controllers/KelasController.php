<?php

namespace App\Http\Controllers;

use App\Http\Requests\KelasRequest;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Daftar Kelas";
        return view('kelas.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tambah Kelas";
        return view('kelas.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KelasRequest $request)
    {
        //Pisahin tanggal
        $arr_tgl = explode(' - ', $request->tgl);
        $tgl_mulai = date("Y-m-d", strtotime($arr_tgl[0]));
        $tgl_akhir = date("Y-m-d", strtotime($arr_tgl[1]));

        //--
        $kelas = new Kelas();

        $kelas->nama = $request->nama;
        $kelas->ruang = $request->ruang;
        $kelas->tipe = $request->tipe;
        $kelas->tgl_mulai = $tgl_mulai;
        $kelas->tgl_akhir = $tgl_akhir;
        $kelas->save();
        return redirect()->route('kelas.index')->with('save', 'data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit($kela)
    {
        $kelas = Kelas::findOrFail(decrypt($kela));
        $title = "Edit Kelas";

        $tgl_mulai = date('m/d/Y', strtotime($kelas->tgl_mulai));
        $tgl_akhir = date('m/d/Y', strtotime($kelas->tgl_akhir));
        $kelas->tgl = $tgl_mulai . " - " . $tgl_akhir;
        return view('kelas.edit', compact('kelas', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(KelasRequest $request, $kela)
    {
        $kelas = Kelas::findOrFail($kela);

        //Pisahin tanggal
        $arr_tgl = explode(' - ', $request->tgl);
        $tgl_mulai = date("Y-m-d", strtotime($arr_tgl[0]));
        $tgl_akhir = date("Y-m-d", strtotime($arr_tgl[1]));

        //--
        $kelas->nama = $request->nama;
        $kelas->ruang = $request->ruang;
        $kelas->tipe = $request->tipe;
        $kelas->tgl_mulai = $tgl_mulai;
        $kelas->tgl_akhir = $tgl_akhir;
        $kelas->save();
        return redirect()->route('kelas.index')->with('save', 'data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kela)
    {
        $kela->delete();
        $result['error'] = false;
        $result['message'] = 'Data kelas berhasil dihapus';
        return response()->json($result, 200);
    }
    public function json()
    {
        $kelas = Kelas::select('id', 'nama', 'tipe', 'ruang', 'tgl_mulai', 'tgl_akhir');
        return DataTables::of($kelas)
            ->addColumn('no', '')
            ->addColumn('aksi', function (kelas $kelas) {
                return '<a href="/kelas/' . encrypt($kelas->id) . '/edit"  class="btn btn-xs btn-info waves-effect waves-light">Edit</a> <a href="javascript:void(0);" data-id=' . $kelas->id . ' class="btn btn-xs btn-danger waves-effect waves-light delete">Hapus</a>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}
