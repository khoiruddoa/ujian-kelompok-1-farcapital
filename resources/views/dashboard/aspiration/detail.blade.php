@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Aspiration</h1>

    </div>
    <div class="card mb-3">
        <img class="card-img-top" id="photo" src="..." alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title" id="name">nama</h5>
          <h6 class="card-title" id="email">email</h6>
          <h6 class="card-title" id="telephone">telephone</h6>
          <p class="card-text" id="message">pesan</p>
          <p class="card-text"><small class="text-muted" id="address">alamat</small></p>
        </div>
      </div>
    <script>
        $.ajax({
            url : "http://127.0.0.1:8000/api/aspiration/{{$id}}",
            method : "GET",
            success : response => {
                let aspiration = response.data
                console.log(aspiration);
                $("#photo").attr("src",`/storage/images/${aspiration.photo}`)
                $("#name").val(aspiration.name)
                $("#email").val(aspiration.email)
                $("#address").val(aspiration.address)
                $("#telephone").val(aspiration.telephone)
                $("#message").val(aspiration.message)
            }
        })
    </script>
@endsection
