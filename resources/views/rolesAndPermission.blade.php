@extends('home')
@section('dashboard')
  <div class="row container">
      <div class="col-md-6 col ">
          <div class="card">
              <div class="card-header"> Roles </div>
              <div class="card-body">
                  <table class="table table-striped table-bordered">
                      <thead>
                          <tr>
                            <th scope="col">id</th>
                            <th scope="col">Role Name</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($roles as $role)
                          <tr>
                            <th scope="row">{{$role->id}}</td>
                            <td>{{$role->name}}</td>
                          </tr>

                          @endforeach

                      </tbody>
                  </table>
              </div>
          </div>
      </div>
      <div class="col">
            <div class="card">
                <div class="card-header">Add new role</div>
                <div class="card-body">
                    <form action="{{action('adminController@newRole')}}" method="POST">
                        @csrf
                        <label for="name" class="col-md-4 col-form-label ">{{ __('Role') }}</label>
                        <input id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                    <button type="submit" class="btn btn-success">ADD</button>
                    </form>


                </div>
            </div>
      </div>
  </div>
@endsection
