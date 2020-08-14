@foreach ($attachments as $attachment)
<ul class="list-group list-group-flush">
    <li class="list-group-item"><b> RCODE: </b> {{$attachment->rcode}} </li>
    <li class="list-group-item"><b>RECEIPT NUMBER: </b>{{$attachment->receiptNumber}}</li>
    <li class="list-group-item"> <b>AMOUNT: </b> {{ $attachment->amount}}</li>
    <li class="list-group-item"> <b>DETAILS: </b> {{$attachment->details}}</li>

</ul>
@endforeach
