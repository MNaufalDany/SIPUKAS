<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with('siswa')
            ->select('id_siswa', \DB::raw('MAX(id) as id'), \DB::raw('MAX(tgl_bayar) as tgl_bayar_last'), \DB::raw('SUM(jumlah_bayar) as total_bayar'))
            ->groupBy('id_siswa')
            ->orderByDesc('tgl_bayar_last')
            ->paginate(5);

        return view('pembayaran.index', compact('pembayarans'));
    }










    public function history($id_siswa)
    {
        $pembayaranss = Pembayaran::where('id_siswa', $id_siswa)->paginate(5);
        return view('pembayaran.history', compact('pembayaranss'));
    }


    public function create()
    {
        $data = Siswa::all();
        return view('pembayaran.create', compact('data'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_siswa' => 'required',
            'tgl_bayar' => 'required',
            'jumlah_bayar' => 'required'
        ]);

        Pembayaran::create([
            'id_siswa' => $request->id_siswa,
            'tgl_bayar' => $request->tgl_bayar,
            'jumlah_bayar' => $request->jumlah_bayar
        ]);

        return redirect()->route('pembayaran.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    public function edit($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        return view('pembayaran.edit', compact('pembayaran'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'kelas' => 'required'
        ]);

        $pembayaran = Pembayaran::findOrFail($id);

        $pembayaran->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas
        ]);

        return redirect()->route('pembayaran.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Request $request, $id)
    {
        $pembayaran = Pembayaran::find($request->id);
        $pembayaran->delete();

        return redirect()->route('pembayaran.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
