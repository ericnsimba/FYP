



@role('bursar')
{{-- <ul >
    @forelse ($imprestNotifications as $key => $notification)
    <a href="#" id="noti" value="{{$notification['data']['icode']}}" class="list-group-item">New imprest From
        {{$notification['data']['sender']}} </a>
    @empty
    <li class="list-group-item">No new imprest notifications </li>
    @endforelse


</ul>
<ul class="list-group list-group-flush">
    @forelse ($retirementNotifications as $key => $notification)
    <a href="#" id="rnoti" value="{{$notification['data']['rcode']}}" class="list-group-item">New Retirement
        {{$notification['data']['sender']}} </a>
    @empty
    <li class="list-group-item">No new retirement notifications </li>
    @endforelse
</ul> --}}
{{-- <x-alert></x-alert> --}}
@endrole

