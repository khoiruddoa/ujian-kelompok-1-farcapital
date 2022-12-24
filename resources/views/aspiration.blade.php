@extends('layouts.main')
@section('container')
    <h1>Silahkan sampaikan aspirasi anda !</h1>
    <form action="/store" method="post">
        @csrf
        <div class="form-group">
          <label for="nama">Nama</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="masukkan nama">
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" class="form-control" name="email" id="email" placeholder="masukkan email">
        </div>
          <div class="form-group">
            <label for="address">Alamat</label>
            <textarea class="form-control" name="address" id="address" rows="3" rows="10"></textarea>
          </div>
          <div class="form-group">
            <label for="telephone">Nomor Telepon</label>
            <input type="text" class="form-control" name="telephone" id="telephone" placeholder="masukkan nomor telepon">
          </div>
          <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control" name="photo" id="photo" placeholder="masukkan photo" onchange="loadFile(event)">
          </div>
          <div class="form-group">
            <label for="message">Pesan</label>
            <textarea  class="form-control" name="message" id="message" rows="3" rows="10"></textarea>
          </div>
        <img id="output">
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    <script>
        var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
@endsection
