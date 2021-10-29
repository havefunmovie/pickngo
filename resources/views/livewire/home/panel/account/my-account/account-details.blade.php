<div>
    <div class="row">
        <div class="fw-bold col-11"><span class="text-pink"><i class="mdi mdi-account mdi-24px"></i></span> My Account Details</div>
        <a href="{{ route('home.account.edit') }}" class="btn btn-pink float-right col-1">Edit</a>
    </div>
    <div class="row mt-2">
        <hr>
    </div>
    <div class="row">
        <div class="col">
            <p class="fw-bold">Contact Details</p>
            <p class="text-secondary fw-light">
                {{ $user['name'] . ', ' . $user['family'] }} <br>
                {{ $user['email'] }} <br>
                {{ __('Phone: ') . $user['mobile'] }}
            </p>
        </div>
        <div class="col">
            <p class="fw-bold"> Address Info </p>
            <p class="text-secondary fw-light">
                {{ $user['address'] }} <br>
                {{ $user['postal'] }} <br>
                {{ __('Canada, ') . $user['province'] }}
            </p>
        </div>
    </div>
</div>
