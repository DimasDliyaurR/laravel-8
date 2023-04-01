<?php

namespace App\Http\Controllers;

use App\Models\stok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StokController extends Controller
{

    public function index()
    {
        return view('admin.table',[
            "stok" => stok::all()
        ]);
    }

    public function form_insert()
    {
        return view('admin.form_insert');
    }

    public function insert_data(Request $request)
    {

        $request->validate(
            [
                'nama_barang' => 'required|unique:stoks',
                'satuan' => 'required',
                'harga_pokok' => 'required',
                'harga_satuan' => 'required',
            ],
            [
                'nama_barang.required' => 'Nama Barang tidak boleh kosong',
                'nama_barang.unique' => 'Nama Barang sudah ada',
                'satuan.required' => 'Satuan tidak boleh kosong',
                'harga_pokok.required' => 'Harga Pokok tidak boleh kosong',
                'harga_satuan.required' => 'Harga Satuan tidak boleh kosong',
            ]
        );

        $user = new stok();
        $user->nama_barang = $request->nama_barang;
        $user->satuan = $request->satuan;
        $user->harga_pokok = $request->harga_pokok;
        $user->harga_satuan = $request->harga_satuan;
        $user->save();
        
        return redirect('form_insert')->with("status","Data anda telah ditambahkan!");
    }

    public function search(Request $request)
    {
        $search = $request->cari;
        $stok = stok::where('nama_barang', 'like', '%'.$search.'%')->paginate(5);
        return view('table', ['stok' => $stok]);
    }

    public function delete($id)
    {
        DB::table("stoks")->where("kode_barang",$id)->delete();
        return redirect('gudang_stok')->with("status","Data anda telah dihapus!");
    }

    public function update(Request $request){
        $id = $request->kode_barang;

        DB::table("stoks")->where("kode_barang",$id)->update([
            "nama_barang" => $request->nama_barang,
            "satuan" => $request->satuan,
            "harga_pokok" => $request->harga_pokok,
            "harga_satuan" => $request->harga_satuan,
        ]);

        return redirect('gudang_stok')->with("status","Data anda telah diubah!");   
    }

}
