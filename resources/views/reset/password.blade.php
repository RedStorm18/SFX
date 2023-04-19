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
          <div class="card-header">Reset Password</div>
          <div class="card-body">

            @if(Session::has('message'))
              <div class="alert alert-info alert-dismissible fade show">
                {{ Session::get('message') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
              </div>
            @endif

            @if(Session::has('error'))
              <div class="alert alert-danger alert-dismissible fade show">
                {{ Session::get('error') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
              </div>
            @endif

            @if ($errors->any())
              @foreach ($errors->all() as $error)
                <div class="alert alert-danger alert-dismissible fade show">
                  {{ $error }}
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
              @endforeach
            @endif

            {!! Form::open(['method'=>'POST', 'action'=> 'App\Http\Controllers\Auth\ResetController@store']) !!}

            <div class="form-group">
              {!! Form::label('email', 'Email:') !!}
              {!! Form::email('email', null, ['class'=>'form-control'])!!}
            </div>


            <div class="form-group">
              {!! Form::submit('Sent Email', ['class'=>'btn btn-primary']) !!}

            </div>

            {!! Form::close() !!}
            <button class="btn btn-primary" onclick="location='/'"> Go Back</button>

          </div>

        </div>
      </div>
    </div>
  </div>
</body>
</html>
