<?php

namespace App\Http\Controllers;

use App\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $kegiatan = Kegiatan::where('id_user', Auth::user()->id)->get();
        return view('kegiatan.show_all', compact('kegiatan'));
    }

    public function create()
    {
        return view('kegiatan.create');
    }

    public function home()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        // $kegiatan = new Kegiatan;
        $kegiatan = $this->validasi();
        $namaimage = time() . '.' . $request->image->extension();
        $kegiatan['image'] = $namaimage;
        $request->image->move(public_path('img/photos'), $namaimage);
        $kegiatan = Kegiatan::create($kegiatan);

        return redirect()->route('kegiatans.show', ['kegiatan' => $kegiatan->id])->with('success', 'Berhasil Tambah Data Kegiatan!');
    }

    public function show($id)
    {
        $kegiatan = Kegiatan::find($id);
        return view('kegiatan.show', compact('kegiatan'));
    }
    public function edit($id)
    {
        $kegiatan = Kegiatan::where('id', $id)->first();
        return view('kegiatan.edit', compact('kegiatan'));
    }

    public function update(Request $request, $id)
    {
        $kegiatan = Kegiatan::find($id);
        $data = $this->validasi();
        if ($request->file('image') !== null) {
            $path = public_path() . '/img/photos/';
            if ($kegiatan->image !== ''  && $kegiatan->image !== null) {
                $file_old = $path . $kegiatan->image;
                unlink($file_old);
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->extension();
            $file->move($path, $filename);
            $data['image'] = $filename;
        }
        // dd($data);
        $kegiatan->update($data);
        return redirect()->back()->with('success', 'Sukses Update Data Diri');
    }

    public function validasi()
    {
        return request()->validate([
            'nama' => 'required',
            'uraian' => 'required',
            'keterangan' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'id_user' => 'required'
        ]);
    }
}
