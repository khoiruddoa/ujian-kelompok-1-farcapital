<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Styles -->
    <style>
        .container {
            max-width: 500px;
        }
        .reload {
            font-family: Lucida Sans Unicode
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2>Form Pengaduan dan aspirasi</h2>
        
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{url('captcha-validation')}}">
            @csrf

            <div class="form-group">
                <label>First Name</label>
                <input type="text" class="form-control" name="name">
            </div>

              <div class="form-group">
                <label>Last Name</label>
                <input type="text" class="form-control" name="name">
            </div>

            <br>

          <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="enter e-mail" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <span class="input-group-text" id="basic-addon2">@gmail.com</span>
</div>

             <div class="mb-3">
      <label for="disabledSelect" class="form-label">Distric</label>
      <select id="disabledSelect" class="form-select">
        <option>Cimahi</option>
        <option>Ciseeng</option>
        <option>Cieuterup</option>
      </select>
    </div>

    <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">address</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>

            <div class="form-group">
                <label for="">Telephone</label>
                <input type="text" class="form-control" name="">
            </div>

            <br>

            <div class="mb-3">
  <input class="form-control form-control-sm" id="formFileSm" type="file">
</div>

            <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Message</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>

            <div class="form-group mt-4 mb-4">
                <div class="captcha">
                    <span>{!! captcha_img() !!}</span>
                    <button type="button" class="btn btn-danger" class="reload" id="reload">
                        &#x21bb;
                    </button>
                </div>
            </div>

            <div class="form-group mb-4">
                <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </div>
        </form>
    </div>
</body>
<script type="text/javascript">
    $('#reload').click(function () {
        $.ajax({
            type: 'GET',
            url: 'reload-captcha',
            success: function (data) {
                $(".captcha span").html(data.captcha);
            }
        });
    });
</script>
</html>