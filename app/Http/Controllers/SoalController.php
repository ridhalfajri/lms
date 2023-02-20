<?php

namespace App\Http\Controllers;

use App\Http\Requests\SoalRequest;
use App\Models\Soal;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SoalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Bank Soal";
        return view('soal.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tambah Soal";
        return view('soal.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SoalRequest $request)
    {
        $soal = new Soal();
        $soal->pertanyaan = $request->pertanyaan;
        $soal->opsi1 = $request->opsi1;
        $soal->opsi2 = $request->opsi2;
        $soal->opsi3 = $request->opsi3;
        $soal->opsi4 = $request->opsi4;
        $soal->jawaban = $request->jawaban;
        $soal->save();
        return redirect()->route('soal.index')->with('save', 'Soal berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function show(Soal $soal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function edit($soal)
    {
        $soal = Soal::findOrFail(decrypt($soal));
        $title = "Edit Soal";
        return view('soal.edit', compact('soal', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function update(SoalRequest $request, $soal)
    {
        $soal = Soal::findOrFail($soal);
        $soal->pertanyaan = $request->pertanyaan;
        $soal->opsi1 = $request->opsi1;
        $soal->opsi2 = $request->opsi2;
        $soal->opsi3 = $request->opsi3;
        $soal->opsi4 = $request->opsi4;
        $soal->jawaban = $request->jawaban;
        $soal->save();
        return redirect()->route('soal.index')->with('save', 'Soal berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Soal  $soal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Soal $soal)
    {
        $soal->delete();
        $result['error'] = false;
        $result['message'] = 'Data layanan pelatihan berhasil dihapus';
        return response()->json($result, 200);
    }

    public function json()
    {
        $soal = Soal::select('id', 'pertanyaan', 'opsi1', 'opsi2', 'opsi3', 'opsi4', 'jawaban');
        return DataTables::of($soal)
            ->addColumn('no', '')
            ->addColumn('aksi', function (Soal $soal) {
                return '<a href="/soal/' . encrypt($soal->id) . '/edit"  class="btn btn-xs btn-info waves-effect waves-light">Edit</a> <a href="javascript:void(0);" data-id=' . $soal->id . ' class="btn btn-xs btn-danger waves-effect waves-light delete">Hapus</a>';
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }
}
