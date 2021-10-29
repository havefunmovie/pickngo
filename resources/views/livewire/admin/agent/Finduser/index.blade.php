<div>
    <div class="card">
        <div class="card-header">
            <label>Search For User Or Existing User</label>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <label>Enter User: Email Or Phone</label>
                    <div class="input-group mb-3 rounded">
                        <input type="text" class="form-control" wire:model="user_info">
                        <div class="input-group-append">
                          <button wire:click.lazy="search_user" class="btn btn-outline-primary" type="button"><i class="mdi mdi-magnify"></i> search</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    @if($notification == 'accepted')
                        <div class="alert alert-info" role="alert">
                            User accept your request.
                            <p>you can find user information in any service you need</p>
                        </div> 
                    @elseif($notification == 'sent')
                        <div class="alert alert-success" role="alert">
                           <i class="mdi mdi-bell" style="font-size: 1.2rem;"></i> {{ $notification_content }}
                        </div> 
                    @endif
                    @if($users && $show)
                    <div class="row m-md-4">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }} {{ $user->family }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->mobile }}</td>
                                        <td>
                                            @if (!$user->agent_id == auth()->user()->id)
                                                <a href="#" class="btn btn-sm btn-outline-primary" wire:click="accessToUserInfo({{ $user->id }} ,{{ auth()->user()->id }})"> <i class="mdi mdi-account-key" style="font-size: 1.2rem;"></i> access ino</a>
                                            @else
                                                <span class="text-info"><i class="mdi mdi-information-outline" style="font-size: 1rem;"></i> it's your customer</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                </div>
            </div>    
        </div>
    </div>
</div>