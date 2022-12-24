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
        <button onclick="add()" class="btn btn-primary">Submit</button>
      </form>
      <script>
        function add() {

            let name = $("#name").val()
            let username = $("#username").val()
            let email = $("#email").val()
            let password = $("#password").val()

            if(name == "") return alert("nama tidak boleh kosong")
            if(username == "") return alert("username tidak boleh kosong")
            if(email == "") return alert("email tidak boleh kosong")
            if(password == "") return alert("password tidak boleh kosong")

            let fd = new FormData();
            fd.append("name",name)
            fd.append("username",username)
            fd.append("email",email)
            fd.append("password",password)
            $.ajax({
            url : "http://127.0.0.1:8000/api/register",
            method : "POST",
            data : fd,
            processData : false,
            contentType : false,
            success : _ => {
                window.location.href = "http://127.0.0.1:8000/dashboard"
            }
            })
        }
    </script>
@endsection
