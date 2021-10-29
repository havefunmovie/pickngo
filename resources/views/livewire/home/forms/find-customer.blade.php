<div class="card">
    @if ($notification)
        <p class="alert alert-warning">{{ $notification }}</p>
    @endif
    <div class="card-header">
        <p class="text-success">Are you used our service previously?</p>
    </div>
    <div class="card-body my-5">
        <div class="col-6 offset-3 text-center">
            <span wire:click="existingUser" class="m-4 border p-3 rounded bg-green-300 pointer-hand hover:bg-green-500 hover:text-white" style="cursor:pointer">Find existing customer</span> 
            <span wire:click="newUser" class="m-4 border p-3 rounded bg-green-300 pointer-hand hover:bg-green-500 hover:text-white" style="cursor:pointer"> Continue as new Customer</span>
        </div>
        @if ($existingUser)
            <div class="row mt-5">
                <div class="col-md-3">
                    <label class="mb-3">Find Yourself <small>(email or phone) :</small></label>
                    <div class="input-group mb-3 rounded">
                        <input type="text" class="form-control" wire:model="user_info">
                        <div class="input-group-append">
                        <button wire:click.lazy="search_user" class="btn btn-outline-primary ml-4" type="button"><i class="mdi mdi-magnify"></i> search</button>
                        </div>
                    </div>
                </div>
                @if($user)
                    <div class="col-md-9">
                        <table class="table table-bordered"">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">select user</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>{{ $user->name .' '. $user->family}}</td>
                                        <td>{{ $user->mobile }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td><input wire:click="selectedUser" type="checkbox" class="form-check-input"></td>
                                    </tr>

                            </tbody>
                        </table>
                        <button wire:click="sendDataToNextLevel" {{ $disabled }} class="btn btn-success float-right">next</button>
                    </div>
                @endif
            </div>
        @endif
    </div>
</div>