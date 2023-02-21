<?php

namespace App\Http\Controllers;

use App\Http\Requests\JadwalRequest;
use App\Http\Requests\KelasRequest;
use App\Models\Jadwal;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;
use Yajra\DataTables\Facades\DataTables;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Daftar Jadwal Instruktur";
        return view('jadwal.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tambak Jadwal Instruktur";
        $kelas = Kelas::all();
        $instruktur = User::leftJoin('jadwal', 'users.id', '=', 'jadwal.instruktur_id')->whereNull('kelas_id')
            ->select('users.id', 'users.name')
            ->get();
        return view('jadwal.create', compact('title', 'kelas', 'instruktur'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JadwalRequest $request)
    {
        $jadwal = new Jadwal();
        $jadwal->kelas_id = $request->kelas;
        $jadwal->instruktur_id = $request->instruktur;
        $jadwal->save();
        return redirect()->route('jadwal.index')->with('save', 'jadwal berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit($jadwal)
    {
        $jadwal = Jadwal::findOrFail(decrypt($jadwal));
        $title = "Tambak Jadwal Instruktur";
        $kelas = Kelas::all();
        return view('jadwal.edit', compact('title', 'kelas', 'jadwal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(JadwalRequest $request, Jadwal $jadwal)
    {
        $jadwal->kelas_id = $request->kelas;
        $jadwal->save();
        return redirect()->route('jadwal.index')->with('save', 'data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        $result['error'] = false;
        $result['message'] = 'Data jadwal instruktur berhasil dihapus';
        return response()->json($result, 200);
    }
    public function json()
    {
        $jadwal = Jadwal::leftJoin('kelas AS kls', 'jadwal.kelas_id', '=', 'kls.id')
            ->leftJoin('users AS instruktur', 'instruktur.id', '=', 'jadwal.instruktur_id')
            ->select(array('jadwal.id', 'kls.nama AS nama_kelas', 'instruktur.name AS nama_instruktur', 'kls.tgl_mulai', 'kls.tgl_akhir'));

        return DataTables::of($jadwal)
            ->addColumn('no', '')
            ->addColumn('aksi', function (Jadwal $jadwal) {
                return '<a href="/jadwal/' . encrypt($jadwal->id) . '/edit"  class="btn btn-xs btn-info waves-effect waves-light">Edit</a> <a href="javascript:void(0);" data-id=' . $jadwal->id . ' class="btn btn-xs btn-danger waves-effect waves-light delete">Hapus</a>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}
