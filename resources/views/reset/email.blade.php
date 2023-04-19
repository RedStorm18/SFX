<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SFXS CODING</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verify Your Email Address</div>

                <div class="card-body">
                  @if (session('resent'))
                      <div class="alert alert-success" role="alert">
                          {{ __('A fresh verification link has been sent to your email address.') }}
                      </div>
                  @endif
                  @if(Session::has('error'))
                    <p class=" pb-3 alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('error') }}</p>
                  @endif

                    Before proceeding, please check your email for a verification link.
                    If you did not receive the email

                        <form class="d-inline" method="POST" action="App\Http\Controllers\Auth\ResetController@verify">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline" style="text-decoration:none;">{{ __('click here to request another') }}</button>.
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
