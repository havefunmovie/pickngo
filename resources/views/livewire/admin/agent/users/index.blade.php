<div>
    <x-slot name="title">
        users
    </x-slot>
    <x-slot name="styles">
        <link rel="stylesheet" href="{{ asset('css/tailwind.min.css') }}" />
    </x-slot>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Users</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Users</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- User Info Popup Model -->
    <div id="user-info" class="modal fade in bt-switch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light">
                    <h3 class="modal-title" id="myModalLabel"><b>Envelop Information</b></h3>
                    <button type="button" class="close" id="close-add-contact" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
                    {{-- User information --}}
                    <div class="card">
                        <div class="card-header">
                            <i class="mdi mdi-account"></i>
                        User Informations
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Name") }}:</label>
                                <div class="col-md-9 col-xs-6">
                                    <label class="mt-2" id="name"></label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Email") }}:</label>
                                <div class="col-md-9 col-xs-6">
                                    <label class="mt-2" id="email"></label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Phone") }}:</label>
                                <div class="col-md-9 col-xs-6">
                                    <label class="mt-2" id="phone"></label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-md-3 col-xs-4 col-form-label">{{ __("Address") }}:</label>
                                <div class="col-md-9 col-xs-6">
                                    <label class="mt-2" id="address"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
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
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="page-title">User List</h4>
                                <h6 class="card-subtitle"></h6>
                            </div>
                        </div>
                        <div class="table-responsive mt-3">
                            <livewire:admin.agent.users.user-datatable />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>
            window.addEventListener('user-detail', event => {
                $('#name').text(event.detail.name + " " + event.detail.family);
                $('#email').text(event.detail.email);
                if(event.detail.mobile)
                    $('#phone').text(event.detail.mobile);
                else
                    $('#phone').text('-');
                if(event.detail.address)
                    $('#address').text(event.detail.address + ", " + event.detail.city + ", " + event.detail.ptovince + ", Canada, " + event.detail.postal);
                else
                    $('#address').text('-');
                $("#user-info").modal("show");
            });

            $(document).ready(function() {
            });
        </script>
    </x-slot>
</div>