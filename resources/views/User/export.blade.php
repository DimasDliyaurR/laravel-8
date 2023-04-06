@extends('layouts.appUser')
@section('content')
    <div class="container">
        <div class=" container-fluid d-flex justify-content-between">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">Export</button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="export/pdf">PDF</a></li>
                <li><a class="dropdown-item" onclick="ExportToExcel('xlsx')">Excel</a></li>
                <li><a class="dropdown-item" onclick="Export2Word('word-export-area', 'Gudang-Kelompok-1');">Word</a></li>
            </ul>
        </div>
        <div id="word-export-area">

            <table class="table" id="table">
                <tr>
                    <th scope="col">kode Barang</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Harga Pokok</th>
                    <th scope="col">Harga Satuan</th>
                </tr>
                @foreach ($data as $dt)
                    <tr>
                        <td>{{ $dt->kode_barang }}</td>
                        <td>{{ $dt->nama_barang }}</td>
                        <td>{{ $dt->satuan }}</td>
                        <td>{{ $dt->harga_pokok }}</td>
                        <td>{{ $dt->harga_satuan }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
