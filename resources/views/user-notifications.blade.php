
<div class="card" style="margin-right: 0px;border-right-width: 0px;margin-left: 9px;left: 0px;right: 0px;">
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
