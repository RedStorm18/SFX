@extends('layouts.app')

@section('content')



<div class="contain">

    <h4 class="text-center">Laravel RealTime CRUD Using Google Firebase</h4><br>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-header">
                            CUSTOMERS
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">Customer ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Sex</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                              @if($ref==null)
  
                              @else
                              @foreach ($ref as $key => $value)
                              <tr>
                                <td>{{$value['cID']}}</td>
                                <td>{{$value['firstName']}}</td>
                                <td>{{$value['lastName']}}</td>
                                <td>{{$value['sex']}}</td>
                                <td>{{$value['email']}}</td>
                                <td>{{$value['number']}}</td>

                                <td>
                                  <a href = {{route('edit',['key'=>$key])}}><i class='bx bxs-edit' id = edit></i></a>
                                  <i class='bx bxs-trash-alt' id = delete data-toggle="modal" data-target="#myModal" data-id = "{{$key}}"></i>
                                </td>
                              </tr>
                               @endforeach
                              @endif
                            </tbody>
                          </table>
                  </div>
                </div>
            </div>


            <div class="col-lg-5">
                <div class="card">
                    <div class="card-header">
                            CREATE CUSTOMER
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('c_create') }}" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group row">
                              <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
              
                              <div class="col-md-6">
                                <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>
              
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
                                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>
              
                                  @error('lastName')
                                    <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                    </span>
                                  @enderror
                                </div>
                              </div>


                              <div class="form-group row">
                                <label for="sex" class="col-md-4 col-form-label text-md-right">{{ __('Sex') }}</label>
                                  
                                <div class="col-md-6">
                                  <select class="form-select" aria-label="Default select example" id="sex" name="sex">
                                    <option selected value="Male">Male</option>
                                    <option value="Female">Female</option>
                                  </select>
                                  </div>
                              </div>


                              <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
              
                                <div class="col-md-6">
                                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
              
                                    @error('email')
                                      <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
                                  </div>
                                </div>
                                
                                <div class="form-group row">
                                  <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>
                  
                                  <div class="col-md-6">
                                    <input id="number" type="text" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="number" autofocus>
                  
                                      @error('number')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                    </div>
                                  </div>
                  
                        
                                <div class="form-group row">
                                  <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
              
                                  <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
              
                                      @error('password')
                                        <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                        </span>
                                      @enderror
                                    </div>
                                  </div>
              
                                  <div class="form-group row">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
              
                                    <div class="col-md-6">
                                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                  </div>
              
                                  <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                      <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                      </button>
                                    </div>
                                  </div>
                                </form>



                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
