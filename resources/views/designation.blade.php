@extends('home')

@section('dashboard')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
             <div class="card-header">{{ __('Create Designation') }}</div>

                <div class="card-body">
                    <form action="{{action('adminController@createDesignation')}}" method="post">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Designation Name') }}</label>

                        <div class="col-md-6">
                            <input  type="TEXT" class="form-control @error('name') is-invalid @enderror" name="name"  required autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                     </div>

                      <button type="submit" class="btn btn-success">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
