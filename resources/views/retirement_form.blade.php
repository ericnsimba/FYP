@extends('home')

@section('dashboard')
<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header"> <h5>COICT IMPREST RETIREMENT FORM</h5></div>
            <div class="card-body">
                <form action="{{action('RetirementController@store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label for="ImprestCode">Select Imprest Code </label>
                    <select type="number" name="icode" id="selectIcode " required class="form-control selectIcode"
                        @error('icode') is-invalid @enderror>
                        <option value="disabled selected">Please enter imprest code </option>
                        @foreach ($icodes as $icode)
                        <option @if(request()->has('icode')) selected @endif value="{{$icode}}">{{$icode}}</option>
                        @endforeach
                    </select>
                    @error('icode')
                    <span class="alert text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror



                    <br>
                    <label for="name">Name:
                        <input class="form-control" id="name" type="text" value="" readonly>
                    </label>
                    <br>
                    <label for="amount">Amount:
                        <input class="form-control" id="amount" type="text" readonly>
                    </label>
                    <br>
                    <label for="IssuedDate">Issued Date:
                        <input class="form-control" id="date" type="text" readonly>
                    </label>
                    <br>
                    <div class="form-group row">
                        <div class="col">
                            <label for="Details">Details
                                <input type="text" class="form-control"  required name="details">
                            </label>
                        </div>

                        <div class="col">
                            <label for="ReceiptFile"> Receipt
                                <input type="file" class="form-control" @error('ReceiptFile') is-invalid @enderror
                                    name="receiptFile">

                            </label>
                            @error('ReceiptFile')
                            <span class="alert text-danger">
                                <strong>{{$message}}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="ReceiptNumber"> ReceiptNumber
                                <input type="number" class="form-control" required name="receiptNumber">
                            </label>
                        </div>
                        <div class="col">
                            <label for="Amount"> Amount
                                <input type="number" class="form-control" required  name="amount">
                            </label>

                        </div>

                    </div>
                    @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                    <input type='button' id='but_add' value='Add new' hidden>


                    <br>
                    <label for="total" hidden>Total:
                        <input type="number" class="form-control" readonly>
                    </label>
                    <br>
                    <label for="CummulativeAmount" hidden>Cummulative Amount Retired
                        <input type="number" class="form-control" readonly>
                    </label>
                    <br>
                    <button type="submit" class="btn btn-primary">Submit</button>

                </form>
            </div>
        </div>
    </div>
</div>
<script>
    cconst selectElement = document.querySelector('.ice-cream');

selectElement.addEventListener('change', (event) => {
  const result = document.querySelector('.result');
  result.textContent = `You like ${event.target.value}`;
});



    $(document).ready(function(){
        $('#but_add').click(function(){
             // Selecting last id
  var lastname_id = $('.form-group input[type=text]:nth-child(1)').last().attr('name');
  var split_id = lastname_id.split('_');

  // New index
  var index = Number(split_id[1]) + 1;

     $newExp = $('.form-group:last').clone(true);
     $($newExp).insertAfter(".form-group:last");

     // Set id of new element
  $(newel).find('input[type=text]:nth-child(1)').val("name","name_"+index);
  $(newel).find('input[type=text]:nth-child(2)').val("name","name"+index);
  $(newel).find('input[type=text]:nth-child(3)').val("name","name_"+index);
  $(newel).find('input[type=text]:nth-child(4)').val("name","name"+index);
        });
});

</script>



@endsection
