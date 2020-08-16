<div>
    <ul class="list-group list-group-flush">
        @forelse ($notifications as $notification)
        @if ( $notification->type == "App\Notifications\NewImprestNotify")
        <li class="list-group-item"> <a href="{{action('ImprestController@show',[$notification->data['icode']])}}"
                id="noti">new imprest from {{$notification->data['sender']}}</a></li>
        @elseif($notification->type == "App\Notifications\NewRetirementNotify")
        <li class="list-group-item">
            <a href="#" class="btn" data-toggle="modal" data-target="#basicModal"> new retirement from
                {{$notification->data['sender']}}</a></li>

        <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">RETIREMENT</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <x-rmodal rcode="{{$notification->data['rcode']}}"></x-rmodal>
                    </div>
                    <div class="modal-footer tab-content">
                        <div class="tab-pane fade" id="retirementComment">
                            <textarea name="comment" cols="55" rows="5" placeholder="Comments"></textarea>
                            <a href="{{url("/declineretirement",[$notification->data['rcode']])}}"
                                class="btn btn-primary">SEND</a>
                        </div>
                        <div class="tab-pane active">
                            <a href="{{url("/acceptretirement",[$notification->data['rcode']])}}"
                                class="btn btn-primary">ACCEPT</a>
                            <a href="#retirementComment" data-toggle="pill" class="btn btn-danger">DECLINE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @empty
        <li class="list-group-item">No new Imprest/Retirement</li>
        @endforelse
    </ul>
</div>
