@extends('layouts.appUser')

@section('content')
    <div class="container">
        <center>
            <div class="container">
                <h1 class="text-secondary" id="tx">Welcome {{ Auth::user()->name }}</h1>
                <img src="img./bg.jpg" alt="background" id="bg">
            </div>
        </center>

    </div>
    </div>
@endsection
