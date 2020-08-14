@extends('home')
@section('dashboard')

<ul class="nav nav-pills">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="pill" href="#imprestHistory">Imprest History</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#retirementHistory">Retirement History</a>
    </li>
  </ul>

<div class="tab-content">

<div class="tab-pane container active" id="imprestHistory" >
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col" class="th-sm">Imprest Code</th>
                <th scope="col">Total Amount</th>

                <th scope="col">Date Accepted</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($imprests as $key=>$imprest)
            <tr>
                <td>{{$imprest->icode}}</td>
                <td>{{$imprest->amount}}</td>
                <td>{{$accepted_at[$key]}}</td>

                @if ($status[$key])
                <td class="table-success" >Cleared</td>
                @else
                
                @empty($accepted_at[$key])
                 <td class="table-danger">Pending </td>
                @endempty
                <td class="table-danger"> <a href="{{ action('RetirementController@create', ['icode' => $imprest->icode])}}" >  Not Cleared </a> </td>
                @endif
                 </tr>
                 @empty
                <td> No Imprest Records</td>
            @endforelse
        </tbody>
    </table>
</div>
<div  id="retirementHistory" class="tab-pane container fade" >
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Retirement Code</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Date Submitted</th>
                <th scope="col">Date Accepted</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($retirements as $key=>$retirement)
            <tr>
                <td>{{$retirement->rcode}}</td>
                <td>{{$retirement->totalAmount}}</td>
                <td>{{$retirement->created_at}}</td>
                <td>{{$retirement->accepted_at}}</td>

            </tr>

            @empty
            <td>  No Retirement Records</td>
            @endforelse


        </tbody>
    </table>

</div>
</div>
@endsection

