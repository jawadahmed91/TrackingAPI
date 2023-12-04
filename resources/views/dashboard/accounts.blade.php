@extends('layout.main')

@section('page_title')
{{ $page_name }}
@endsection

@section('content')

<div class="container-fluid bg-theme-primary border-radius-bottoms">
    <div class="container">
        <div class="row">
            <div class="col-9 text-start">
                <h3 class="text-white pt-3 pb-3">{{ @session('name') }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="container mt-4">
    <div class="row">



        <div class="col-12">
            <a href="{{ route('tracking.trackings') }}">
                <div class="alert alert-light" role="alert" data-mdb-color="light">
                    <i class="fa-solid fa-bell me-3 left-icon" style="color: #6A1B9A"></i>Add Tracking
                    <i class="fa-solid fa-angle-right right-arrow"></i>
                </div>
            </a>
        </div>

        <div class="col-12">
            <a href="{{ route('auth.logout') }}">
                <div class="alert alert-light" role="alert" data-mdb-color="light">
                    <i class="fa-solid fa-candy-cane me-3 left-icon" style="color: #1976D2"></i>Logout
                    <i class="fa-solid fa-angle-right right-arrow"></i>
                </div>
            </a>
        </div>


    </div>
</div>
@endsection
