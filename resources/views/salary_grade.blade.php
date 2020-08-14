@extends('home')

@section('dashboard')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
             <div class="card-header">{{ __('Define new Salary Grade') }}</div>

                <div class="card-body">
                    <form action="{{action('adminController@newsalaryGrade')}}" method="post">
                    @csrf

                    <div class="form-group row">
                        <label for="grade" class="col-md-4 col-form-label text-md-right">{{ __('Grade Name') }}</label>

                        <div class="col-md-6">
                            <input  type="text" class="form-control @error('grade') is-invalid @enderror" name="grade" required autofocus>

                            @error('grade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="from" class="col-md-4 col-form-label text-md-right">{{ __('From') }}</label>

                        <div class="col-md-6">
                            <input  type="number" class="form-control @error('from') is-invalid @enderror" name="from"  required autofocus>

                            @error('from')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                     </div>
                     <div class="form-group row">
                        <label for="to" class="col-md-4 col-form-label text-md-right">{{ __('To') }}</label>

                        <div class="col-md-6">
                            <input  type="TEXT" class="form-control @error('to') is-invalid @enderror" name="to"  required autofocus>

                            @error('to')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                     </div>

                      <button type="submit" class="btn btn-primary">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
