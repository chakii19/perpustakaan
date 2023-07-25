<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\BukuModel;

class BukuController extends Controller

{
    public function bukutampil()
    {
        $databuku = BukuModel::orderby('kode_buku', 'ASC')
        ->paginate(5);

        return view('halaman/view_buku' ,['buku' =>$databuku]);
    }
    public function bukutambahan(Request $request)
    {
        $this->validate($request, [
            'kode_buku' =>'required',
            'judul' => 'required',
            'pengarang' =>'required',
            'kategori' =>'required'
        ]);

        BukuModel::create([
            'kode_buku' => $request->kode_buku,
            'judul' => $request->judul,
            'pengarang' =>$request->pengarang,
            'kategori' =>$request->kategori
        ]);
        return redirect('/buku');
    }
    public function bukuhapus($id_buku)
    {
        $databuku=BukuModel::find($id_buku);
        $databuku->delete();

        return redirect()->back();
    }
    public function bukuedit($id_buku, Request $request)
    {
        
    }
}
