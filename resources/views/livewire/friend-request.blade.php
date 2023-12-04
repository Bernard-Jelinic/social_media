<div>
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
                        <button wire:click="confirm({{ $friendRequest->id }})" type="button" class="btn btn-primary">Confirm</button>
                        <button wire:click="remove({{ $friendRequest->id }})" type="button" class="btn btn-danger">Remove</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
