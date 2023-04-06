@extends('layouts.app')
@section('content')
    <div class="container-sm d-flex justify-content-between">
        <div class="card bg-secondary" style="height:80vh;">
            <div class="card-body">
                <div class="list-group">
                    <a href="gudang_stok" class="list-group-item list-group-item-action">View Stok
                        Barang</a>
                    <a href="#" class="list-group-item list-group-item-action active">Insert</a>
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
                        {{ session('status') }} <a href="gudang_stok">see</a>
                    </div>
                @endif



                <form action="insert_data" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang">
                    </div>
                    {{-- error status --}}
                    @if ($errors->has('nama_barang'))
                        <div class="alert alert-danger">
                            {{ $errors->first('nama_barang') }}
                        </div>
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Satuan</label>
                        <input type="text" class="form-control" name="satuan">
                    </div>
                    {{-- error status --}}
                    @if ($errors->has('satuan'))
                        <div class="alert alert-danger">
                            {{ $errors->first('satuan') }}
                        </div>
                    @endif
                    <div class="mb-3">
                        <label class="form-label">Harga Pokok</label>
                        <input type="text" class="form-control" name="harga_pokok">
                    </div>
                    {{-- error status --}}
                    @if ($errors->has('harga_pokok'))
                        <div class="alert alert-danger">
                            {{ $errors->first('harga_pokok') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <label class="form-label">Harga Satuan</label>
                        <input type="text" class="form-control" name="harga_satuan">
                    </div>
                    {{-- error status --}}
                    @if ($errors->has('harga_satuan'))
                        <div class="alert alert-danger">
                            {{ $errors->first('harga_satuan') }}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-secondary">Submit</button>
                </form>


            </div>
        </div>





    </div>
@endsection
