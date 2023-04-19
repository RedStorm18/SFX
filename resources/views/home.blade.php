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

                    {{ __('CREATE USER') }}
                    <form method="POST" action="{{ route('home') }}" enctype="multipart/form-data">
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
            
            <br>
            <br>
        

            <div class="card">
                <div class="card-header">
                  READ DATA
                </div>
                <div class="card-body">
      
                        <table class="table">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">First</th>
                              <th scope="col">Last</th>
                              <th scope="col"></th>
                            </tr>
                          </thead>
                          <tbody>
                            @if($ref==null)

                            @else
                            @foreach ($ref as $key => $value)
                            <tr>
                              <td>{{$value['firstName']}}</td>
                              <td>{{$value['lastName']}}</td>
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
              
              <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Delete Data</h4>
                    </div>
                    <div class="modal-body">
                      <p>Are you sure you want to delete this data?</p>
                      <p><strong>ID:</strong> <span id="data-id"></span></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal" id="del">Yes</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                  </div>
                </div>
              </div>
              
        </div>
    </div>
</div>

<script>
$(document).on("click", "#delete", function () {
    var id = $(this).data('id');
    $(".modal-body #data-id").text(id);

    $("#del").click(function(){
      window.location.href = "/delete/"+id;
    });
});
  </script>
@endsection
