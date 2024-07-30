<div>
    <div class="add-billing-method">
        <div>
            @if ( count($friendRequests) == 0 )
                <div class="alert alert-primary" style="margin-bottom: 0px;">
                    There is no friend requests
                </div>
            @else
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Full Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($friendRequests as $friendRequest)
                        <tr>
                            <td>{{ $friendRequest->full_name }}</td>
                            <td>
                                <button wire:click="acceptFriendRequest({{ $friendRequest->id }})" type="button" class="btn btn-primary">
                                    <i class="la la-check"></i>Accept
                                </button>
                                <button wire:click="denyFriendRequest({{ $friendRequest->id }})" type="button" class="btn btn-danger">
                                    <i class="la la-close"></i>Deny
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</div>
@script
    <script>
        Echo.private('friendRequest.' + {{ auth()->user()->id }})
            .listen('.friendRequest.event', function(data) {
                refreshLivewireComponent()
            })
        function refreshLivewireComponent() {
            $wire.refreshComponent()
        }
    </script>
@endscript