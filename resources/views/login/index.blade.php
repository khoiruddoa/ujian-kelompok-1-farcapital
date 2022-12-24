@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-4">

            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <main class="form-signin w-100 m-auto">
                <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                        <div class="invalid_feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    <label for="password" required>Password</label>
                </div>


                <button class="w-100 btn btn-lg btn-primary" id="submit" type="submit">Login</button>
            </main>

        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', async () => {
            const emailInput = document.querySelector('#email');
            const passwordInput = document.querySelector('#password');

            document.querySelector('#submit').addEventListener('click', async () => {
                const fd = new FormData();

                fd.append('email', emailInput.value);
                fd.append('password', passwordInput.value);

                const loginRes = await $.ajax({
                    url: 'http://localhost:8000/api/auth/login',
                    type: 'POST',
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: (res) => {
                        localStorage.setItem('token', res.token);
                        const req = new XMLHttpRequest();
                        req.open('GET', 'http://localhost:8000/dashboard', true); //true means request will be async
                        req.onreadystatechange = function (aEvt) {
                            if (req.readyState == 4) {
                                if(req.status == 200)
                                //update your page here
                                //req.responseText - is your result html or whatever you send as a response
                                else alert("Error loading page\n");
                            }
                        };
                        req.setRequestHeader('Authorization', 'Bearer ' + res.token);
                        req.send();
                    },
                    error: (err) => console.log(err)
                });
            })

        });
    </script>
@endsection
