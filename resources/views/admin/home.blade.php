@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="container-sm d-flex justify-content-between">
            <div class="card bg-secondary" style="height:80vh;">
                <div class="card-body">
                    <div class="list-group">
                        <a href="gudang_stok" class="list-group-item list-group-item-action">View Stok
                            Barang</a>
                        <a href="form_insert" class="list-group-item list-group-item-action">Insert</a>
                        <a href="#" class="list-group-item list-group-item-action">Laporan Stok
                            Barang</a>
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

                    <center>
                        <h1>Welcome {{ Auth::user()->name }}</h1>
                    </center>




                </div>
            </div>

        </div>



    </div>
@endsection
