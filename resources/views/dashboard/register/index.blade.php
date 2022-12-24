@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Admin</h1>

    </div>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <form action="/store" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Nama</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="masukkan nama">
        </div>
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" id="username" placeholder="masukkan username">
          </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" name="email" id="email" placeholder="masukkan email">
        </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="masukkan password">
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
@endsection
