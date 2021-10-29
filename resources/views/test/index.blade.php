@extends('test.layouts.master')

@section('content')
    <div class="index-main-img" style="height: 93vh">
        <div class="container">
            <div class="row py-3 quote-form ">
                <div class="h2 mb-4 text-center">SAVE UP TO <span class="text-danger">70%</span> ON SHIPPING</div>
                <div class="col-md-6 mx-auto card bg-black-light">
                    <div class="card-body">
                        <livewire:ups-testing />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
