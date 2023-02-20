<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Instansi;
use App\Models\User;
use App\Models\UserRole;
use yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        $title = 'Pengguna';
        return view('users.index', compact('user', 'title'));
    }

    public function create()
    {
        $instansi = Instansi::all('id', 'nama');
        $role = UserRole::all('id', 'role');
        $title = 'Tambah Pengguna';
        return view('users.create', compact('title', 'instansi', 'role'));
    }

    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->nip = $request->nip;
        $user->unit_kerja = $request->unit_kerja;
        $user->jabatan = $request->jabatan;
        $user->no_telepon = $request->no_telepon;
        $user->instansi_id = $request->instansi;
        $user->unit_kerja = $request->unit_kerja;
        $user->role_id = $request->role;
        $user->is_active = 1;
        $user->email = $request->email;
        $user->password = encrypt($request->password);
        $user->save();
        return redirect('user')->with('save', 'data berhasil disimpan');
    }

    public function edit($id)
    {
        $user = User::findOrFail(decrypt($id));
        $instansi = Instansi::all('id', 'nama');
        $role = UserRole::all('id', 'role');
        $title = 'Edit Pengguna';
        return view('users.edit', compact('user', 'instansi', 'role', 'title'));
    }

    public function update(UserRequest $request, $id)
    {

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->nip = $request->nip;
        $user->unit_kerja = $request->unit_kerja;
        $user->jabatan = $request->jabatan;
        $user->no_telepon = $request->no_telepon;
        $user->instansi_id = $request->instansi;
        $user->unit_kerja = $request->unit_kerja;
        $user->role_id = $request->role;
        $user->is_active = 1;
        $user->email = $request->email;
        // if ($request->password != nul) {
        //     # code...
        // }
        $user->save();
        return redirect('user')->with('save', 'data berhasil disimpan');
    }

    public function hapus($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        $result['error'] = false;
        $result['message'] = 'Data layanan pelatihan berhasil dihapus';
        return response()->json($result, 200);
    }

    public function json()
    {
        $users = User::leftJoin('user_role AS ur', 'users.role_id', '=', 'ur.id')
            ->leftJoin('instansi AS i', 'users.instansi_id', '=', 'i.id')
            ->select(array('users.id', 'users.name as name', 'users.nip', 'users.jabatan', 'users.no_telepon', 'i.nama AS nama_instansi', 'users.unit_kerja', 'ur.role'));

        return DataTables::of($users)
            ->addColumn('aksi', function (User $user) {
                return '<a href="/user/' . encrypt($user->id) . '/edit"  class="btn btn-xs btn-info waves-effect waves-light">Edit</a> <a href="javascript:void(0);" data-id=' . $user->id . ' class="btn btn-xs btn-danger waves-effect waves-light delete">Hapus</a>';
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }
}
