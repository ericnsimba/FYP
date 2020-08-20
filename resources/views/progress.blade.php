@extends('home')
@section('dashboard')

<h5>PREVIOUS {{count($imprestStaff)}} IMPRESTS</h5>
<div class="shadow p-3 mb-5 bg-white rounded">
@forelse ($imprestStaff as $imprest)
<div class="shadow-sm p-3 mb-5 bg-white rounded">
<h5>Imprest code:{{$imprest->icode}}</h5> <h5>Date accepted:{{$imprest->accepted_at}}</h5>
<div class="progress shadow  rounded" style="height: 30px;">
    <div class="progress-bar" role="progressbar" style="width: 10%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">submited</div>
    <div class="progress-bar " role="progressbar" style="width: 15%;background-color:orange;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">pending</div>
    @if ($imprest->accountingOfficerStatus)
    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">accountant</div>
    @endif
    @if ($imprest->bursarStatus)
    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">bursar</div>
    <div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">issued</div>
    @endif

   @if ($imprest->cleared)
   <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">retired</div>
   @endif
</div>
  </div>
@empty
empty
@endforelse
</div>

@endsection
