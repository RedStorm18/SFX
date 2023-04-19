@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('UPDATE USER') }}
                    <form method="POST" action="/edit/{{$key}}" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group row">
                          <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
          
                          <div class="col-md-6">
                            <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ $ref['firstName'] }}" required autocomplete="firstName" autofocus>
          
                              @error('firstName')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>
                          </div>
          
                        <div class="form-group row">
                          <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
          
                          <div class="col-md-6">
                            <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ $ref['lastName'] }}" required autocomplete="lastName" autofocus>
          
                              @error('lastName')
                                <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                              @enderror
                            </div>
                          </div>
          
                          <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                {{ __('Update') }}
                              </button>
                            </div>
                          </div>
                        </form>
                        <form method="GET" action="/delete/{{$key}}" enctype="multipart/form-data">
                          @csrf
                        <div class="form-group row mt-1">
                          <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                              {{ __('Delete') }}
                            </button>
                          </div>
                        </div>
                        </form>
                    
                </div>
            </div>
            


        </div>
    </div>
</div>
@endsection
