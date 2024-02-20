<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
{
    $siswa = Siswa::orderBy('nama')->paginate(5);
    return view('siswa', compact('siswa'));
}



    public function create()
    {
        return view('create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama'     => 'required|min:5',
            'kelas'   => 'required|min:3'
        ]);

        //create post
        Siswa::create([
            'nama'     => $request->nama,
            'kelas'   => $request->kelas
        ]);

        //redirect to siswa
        return redirect('siswa')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('edit', compact('siswa'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required|min:5',
            'kelas' => 'required|min:5',
        ]);

        $siswa = Siswa::findOrFail($request->id);

        $siswa->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
        ]);

        return redirect('/siswa')->with(['success' => 'Data Berhasil Diupdate!']);
    }



    public function destroy(Request $request, $id)
    {
        $siswa = Siswa::find($request->id);
        // return $guru;
        $siswa->delete();

        //redirect to index
        return redirect()->route('siswa')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}

