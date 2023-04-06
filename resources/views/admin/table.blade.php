@extends('layouts.app')

@section('content')
    <div class="container-sm d-flex justify-content-between">
        <div class="card bg-secondary" style="height:80vh;">
            <div class="card-body">


                <div class="list-group">
                    <a href="gudang_stok" class="list-group-item list-group-item-action active">View Stok
                        Barang</a>
                    <a href="form_insert" class="list-group-item list-group-item-action">Insert</a>
                    <a href="/log_active" class="list-group-item list-group-item-action">Log Activity</a>
                </div>
            </div>
            <div class="card-title" style="width: 20vw;">
            </div>
        </div>

        <div class="card m-shadow" style="width:70vw;">
            <div class="card-body">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif


                <form action="search">
                    <div class="col">
                        <input type="text" class="form-control-sm search" id="search" placeholder="Search"
                            name="cari">
                        <a href="gudang_stok" class="btn btn-secondary">ALL</a>
                    </div>
                </form>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">kode Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Satuan</th>
                            <th scope="col">Harga Pokok</th>
                            <th scope="col">Harga Satuan</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($stok as $st)
                            <tr>
                                <th scope="row">{{ $st->kode_barang }}</th>
                                <td>{{ $st->nama_barang }}</td>
                                <td>{{ $st->satuan }}</td>
                                <td>{{ $st->harga_pokok }}</td>
                                <td>{{ $st->harga_satuan }}</td>
                                <td>
                                    <button class="btn btn-secondary btn-modal-edit" data-bs-toggle="modal"
                                        data-bs-target="#modalEdit" data-id="{{ $st->kode_barang }}"><i class="fa fa-pencil"
                                            style="font-size:20px"></i></button>



                                    <a href="/delete/{{ $st->kode_barang }}" class="btn btn-light shadow-sm"><i
                                            class='fa fa-trash-o' style='font-size:20px'></i></a>





                                </td>
                            </tr>
                        @endforeach
                        {{-- Model --}}
                        <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        {{-- form --}}
                                        <form action="update" method="post">
                                            @csrf
                                            @method('post   ')
                                            <div class="col">
                                                <input type="text" class="form-control kode_barang"
                                                    placeholder="Kode Barang" name="kode_barang" id="kode_barang" hidden>
                                            </div>
                                            <div class="col">
                                                <label for="nama_barang" class="form-label">Nama Barang</label>
                                                <input type="text" class="form-control nama_barang" id="nama_barang"
                                                    placeholder="Nama Barang" name="nama_barang">
                                            </div>
                                            <div class="col">
                                                <label for="satuan" class="form-label">Satuan</label>
                                                <input type="text" class="form-control satuan" placeholder="Satuan"
                                                    name="satuan" id="satuan">
                                            </div>
                                            <div class="col">
                                                <label for="harga_pokok" class="form-label">Harga Pokok</label>

                                                <input type="text" class="form-control harga_pokok" id="harga_pokok"
                                                    placeholder="Harga Pokok" name="harga_pokok">
                                            </div>
                                            <div class="col">
                                                <label for="harga_satuan" class="form-label ">Harga Satuan</label>
                                                <input type="text" class="form-control harga_satuan" id="harga_satuan"
                                                    placeholder="Harga Satuan" name="harga_satuan">
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary">Submit</button>
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </tbody>
                </table>


            </div>
        </div>





    </div>
@endsection
