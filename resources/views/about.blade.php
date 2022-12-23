@extends('layouts.main')
@section('container')
    <h1>halaman about</h1>
    <h4>{{ $name }}</h4>
    <h5>email: {{ $email }}
    </h5>
    <img src="img/<?= $image ?>" alt="khoiruddoa" width="200" class="img-thumbnail rounded-circle">
@endsection
