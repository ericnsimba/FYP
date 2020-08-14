<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

</body>
</html>
@extends('home')

@section('dashboard')
<div class="card">
    <div class="card-header"> <h5> COICT GENERAL IMPREST FORM (GIPF) </h5></div>
    <div class="card-body">
        <form action="{{action('ImprestController@store')}}" method="POST" enctype="multipart/form-data" >
            @csrf


                <label for="Name"> Name </label>
                    <input type="text" name="name" value="{{$auth->name}}" class="form-control" readonly>


                <label for="purpose">
                    Purpose of the imprest  </label>
                    <textarea name="purpose" class="form-control @error('purpose') is-invalid @enderror" cols="70" rows="10"></textarea>

                    @error('purpose')
                    <span class="alert text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                <br>

                <label for="attachment">
                    Attachment  </label>
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-paperclip" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.5 3a2.5 2.5 0 0 1 5 0v9a1.5 1.5 0 0 1-3 0V5a.5.5 0 0 1 1 0v7a.5.5 0 0 0 1 0V3a1.5 1.5 0 1 0-3 0v9a2.5 2.5 0 0 0 5 0V5a.5.5 0 0 1 1 0v7a3.5 3.5 0 1 1-7 0V3z" />
                    </svg>
                    <input class="form-control @error('attachment') is-invalid @enderror" type="file" name="attachment">
                    @error('attachment')
                    <span class="alert text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror

                <br>
                <label for="amount">
                    Imprest amount
                </label>

                    <input  type="number" name="amount" class="form-control @error('amount') is-invalid @enderror am ">

                    @error('amount')
                    <span class=" alert text-danger "> <strong> {{$message}}</strong> </span>
                    @enderror

            <button type="submit" class="btn btn-primary">
                Submit
            </button>
        </form>
    </div>
</div>


@endsection
<script type="text/javascript">
    var mydropdown = document.getElementById('selectExpenditure')
</script>
