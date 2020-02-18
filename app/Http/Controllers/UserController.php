<?php

namespace App\Http\Controllers;

use App\Kegiatan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('admin.index');
    }
    public function userData()
    {
        return DataTables::of(User::query())->make(true);
    }
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $user = $this->validasi();
        $user['created_by'] = Auth::user()->id;
        $user['password'] = Hash::make($request->password);
        event(new \Illuminate\Auth\Events\Registered(User::create($user)));
        return redirect()->back()->with('success', 'Sukses Buat User Baru!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $data = $this->validasi();
        if ($request->file('profile_picture') !== null) {
            $path = public_path() . '/img/photos/';
            if ($user->profile_picture !== 'image.jpg'  && $user->profile_picture !== null) {
                $file_old = $path . $user->profile_picture;
                unlink($file_old);
            }
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->extension();
            $file->move($path, $filename);
            $data['profile_picture'] = $filename;
        }
        $user->update($data);
        return redirect()->back()->with('success', 'Sukses Update Data Diri');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return  redirect()->back()->with('success', 'Terhapus');
    }

    public function destroyed()
    {
        // show user if it's has deleted_at value
        return view('admin/destroyed');
    }
    public function destroyedData()
    {
        return DataTables::of(User::query())->make(true);
    }
    public function restore($id)
    {
        //restoring data to active state
        $user = User::onlyTrashed()->where('id', $id);
        $user->restore();
        return redirect()->back()->with('success', 'Berhasil Restore Data');
    }

    public function force_delete($id)
    {
        //force delete data
        $user = User::onlyTrashed()->where('id', $id);
        $user->forceDelete();
        return redirect()->back()->with('success', 'Berhasil Restore Data');
    }

    public function kegiatan()
    {
        $kegiatan = Kegiatan::all();
        // dd($kegiatan);
        return view('kegiatan.show_all', compact('kegiatan'));
    }
    public function validasi()
    {
        return request()->validate([
            'name' => 'string|required',
            'nim' => 'string|required',
            'email' => 'string|required|unique:users',
            'semester' => 'integer|required',
            'asal_sekolah' => 'string|required',
            'jurusan' => 'string|required',
            'address' => 'string|required',
            'phone' => 'string|required',
            'jenis_kelamin' => 'string|required',
            'password' => 'string|required|confirmed|min:6',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    }
}
