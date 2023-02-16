<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('users.index', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail(decrypt($id));
    }

    public function hapus($id)
    {
        dd(decrypt($id));
    }

    public function json()
    {
        $users = User::leftJoin('user_role AS ur', 'users.role_id', '=', 'ur.id')
            ->leftJoin('instansi AS i', 'users.instansi_id', '=', 'i.id')
            ->select(array('users.id', 'users.name as name', 'users.nip', 'users.jabatan', 'users.no_telepon', 'i.nama AS nama_instansi', 'users.unit_kerja', 'ur.role'));

        return DataTables::of($users)
            ->addColumn('aksi', function (User $user) {
                return '<a href="/user/' . encrypt($user->id) . '/edit" class="btn btn-xs btn-info waves-effect waves-light">Edit</a> <a href="/user/' . encrypt($user->id) . '/hapus" class="btn btn-xs btn-danger waves-effect waves-light">Hapus</a>';
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }
}
