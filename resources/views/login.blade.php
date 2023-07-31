<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    {{-- My Styles --}}
    <link rel="stylesheet" href="/css/style.css">

    <title>SAKIP | {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  </head>

  <body style="background-color: #E9EABD">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <main class="form-signin w-100 m-auto">

                    @if(session()->has('loginError'))
                        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                            {{ session('loginError') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            </button>
                        </div>
                    @endif
                    <div class="rounded-4 my-5 m-4 shadow" style="background-color: white">
                        <div class="mx-4">
                            <img class="mt-4 mb-1 mx-auto position-relative start-50 translate-middle-x" src="/img/bps.png" alt="" width="72" height="57">
                            <h1 class="h3 mb-3 fw-normal text-center">EVALUASI SAKIP</h1>
                            <div class="border-bottom mb-3 border-2"></div>
                            <form action="/login" method="post">
                                @csrf
                            <div class="form-floating">
                                <input type="username" name="username" class="form-control"
                                id="username" placeholder="Username" value="{{ old ('username') }}" autofocus required>
                                <label for="username">Username</label>
                            </div>
                            <div class="form-floating">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>
                            <button class="w-100 btn btn-lg btn-primary" type="submit">Masuk</button>
                            </form>
                            <p class="text-center mt-3">atau</p>
                            <button class="w-100 btn btn-lg btn-dark" type="submit">Masuk dengan SSO BPS</button>
                            <p class="mt-3 pb-3 text-center text-body-secondary">&copy; 2023</p>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  </body>
</html>