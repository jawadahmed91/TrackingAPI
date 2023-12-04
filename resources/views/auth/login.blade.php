@extends('layout.main')

@section('page_title')
{{ $page_name }}
@endsection

@section('content')
<div class="container padding_40">
    <div class="row">
        <div class="col-12 text-center">
            <div class="logo">
                <img src="/images/logo.png" alt="SawaCRM Logo" class="img-fluid pt-5" width="150">
            </div>

            <h2 class="pb-4">Welcome to SawaCRM</h2>
            <form action="{{ route('auth.logged') }}" method="post">
                @csrf

                @if ($message = Session::get('message'))
                <div class="alert alert-danger" role="alert" data-mdb-color="danger">
                    {{ $message }}
                </div>
                @endif

                @error('email')
                    <div class="text-start">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text inputTextIcon" id="search-addon"><i class="fa-solid fa-circle-user"></i></span>
                    <input type="email" name="email" class="form-control inputTextField" placeholder="Email" value="{{ old('email') }}">
                </div>

                @error('password')
                    <div class="text-start">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text inputTextIcon" id="search-addon"><i class="fa-solid fa-key"></i></span>
                    <input type="password" name="password" class="form-control inputTextField" placeholder="Password" {{ old('password') }}>
                </div>


                <section class="p-2 text-center w-100">
                    <button type="submit" class="form-control btn btn-primary">Sign In</button>
                </section>
            </form>

            <section class="p-2 text-end w-100">
                <a class="text-dark" href="{{ route('auth.forget') }}">Forgot password?</a>
            </section>

            <section class="p-2 text-center w-100">
                <a href="{{ route('auth.register') }}">
                    <button type="button" class="form-control btn btn-dark">Create Account</button>
                </a>
            </section>
        </div>
    </div>
</div>
@endsection
