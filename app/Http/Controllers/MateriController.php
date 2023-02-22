<?php

namespace App\Http\Controllers;

use App\Http\Requests\MateriRequest;
use App\Models\Materi;
use Illuminate\Support\Facades\Storage;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materi = Materi::all();
        $title = "Daftar Materi";
        return view('materi.index', compact('title', 'materi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Daftar Materi";
        return view('materi.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MateriRequest $request)
    {
        $materi = new Materi();
        $materi->user_id = auth()->user()->id;
        $materi->level = $request->tipe;
        $materi->judul = $request->judul;
        $materi->deskripsi = $request->deskripsi;
        if ($request->is_show == 1) {
            $materi->is_show = $request->is_show;
        } else {
            $materi->is_show = 0;
        }
        if ($request->file('dokumen_materi')) {
            $materi->path = $request->file('dokumen_materi')->store('dokumen-materi');
        }
        $materi->save();
        return redirect()->route('materi.index')->with('save', 'materi berhasil di upload');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function edit($materi)
    {
        $title = "Edit Materi";
        $materi = Materi::findOrFail(decrypt($materi));
        return view('materi.edit', compact('title', 'materi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function update(MateriRequest $request, Materi $materi)
    {
        $materi->user_id = auth()->user()->id;
        $materi->level = $request->tipe;
        $materi->judul = $request->judul;
        $materi->deskripsi = $request->deskripsi;
        if ($request->is_show == 1) {
            $materi->is_show = $request->is_show;
        } else {
            $materi->is_show = 0;
        }
        if ($request->file('dokumen_materi')) {
            if ($request->old_dokumen) {
                Storage::delete($request->old_dokumen);
            }
            $materi->path = $request->file('dokumen_materi')->store('dokumen-materi');
        }
        $materi->save();
        return redirect()->route('materi.index')->with('save', "Materi berhasil diubah");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Materi $materi)
    {
        if ($materi->path) {
            Storage::delete($materi->path);
        }
        $materi->delete();
        $result['error'] = false;
        $result['message'] = 'Data kelas berhasil dihapus';
        return response()->json($result, 200);
    }
}
