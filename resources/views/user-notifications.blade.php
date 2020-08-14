
<div class="card">
    <div class="card-header"><h5>NOTIFICATIONS</h5></div>
    <div class="card-body">
        <ul class="list-group">
            @if(session()->has('message'))
           <div class = "alert alert-success">
                {{ session()->get('message') }}
           </div>
            @endif
          </ul>
         @role('accountingOfficer|bursar')
        <x-alert></x-alert>
         @endrole
    </div>
</div>
