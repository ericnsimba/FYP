<div class="card shadow p-3 mb-5 bg-white rounded">
    <div class="card-header">
        <h2>IMPREST</h2>
    </div>
    <div class="card-body">

        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b> Icode :</b> {{$imprest->icode}} </li>
            <li class="list-group-item"><b>Employee: </b></li>
            <li class="list-group-item"> <b>Purpose:</b> {{ $imprest->purpose}}</li>
            <li class="list-group-item"><strong> Amount :</strong> {{$imprest->amount}}</li>

        </ul>
    </div>
    <div class="card-footer">
        <button-group style="float:right">
            <a href="{{url("/accept/$staff->id",[$imprest->icode])}}" class="btn btn-primary">ACCEPT</a>
            <a href="{{url("/decline/$staff->id",[$imprest->icode])}}" class="btn btn-danger">DECLINE</a>
        </button-group>
    </div>
</div>
