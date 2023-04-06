<?php

namespace App\Http\Controllers;

use App\Models\stok;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class UserStokController extends Controller
{
    public function index(){
        return view('user.tabel');
    }

    public function export()
    {
        return view('user.export', [
            'data' => stok::all()
        ]);
    }

    public function export_pdf()
    {
        $data = stok::all();
        $pdf = PDF::loadView('user.export_pdf', compact('data'));
        return $pdf->download('Gudang_stok.pdf');
    }

    public function chart()
    {
        $user = stok::select(DB::raw("SUM(harga_pokok) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("nama_barang"))
            ->pluck('count');

        $labels = $user->keys();
        $data = $user->values();

        return view("user.chart", compact('labels', 'data'));
    }


}
