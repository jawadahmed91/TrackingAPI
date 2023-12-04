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

            <h2 class="pb-4">Create a new account</h2>
            <form action="{{ route('auth.registered') }}" method="post">
                @csrf


                @error('name')
                    <div class="text-start">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text inputTextIcon" id="search-addon"><i class="fa-solid fa-user"></i></span>
                    <input type="text" class="form-control inputTextField" placeholder="Full Name" name="name" value="{{ old('name') }}">
                </div>

                @error('email')
                    <div class="text-start">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text inputTextIcon" id="search-addon"><i class="fa-solid fa-circle-user"></i></span>
                    <input type="email" class="form-control inputTextField" placeholder="Email" name="email" value="{{ old('email') }}">
                </div>

                @error('company_name')
                    <div class="text-start">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text inputTextIcon" id="search-addon"><i class="fa-solid fa-building"></i></span>
                    <input type="text" class="form-control inputTextField" placeholder="Company Name" name="company_name" value="{{ old('company_name') }}">
                </div>

                @error('password')
                    <div class="text-start">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text inputTextIcon" id="search-addon"><i class="fa-solid fa-key"></i></span>
                    <input type="password" class="form-control inputTextField" placeholder="Password" name="password" value="{{ old('password') }}">
                </div>

                @error('password_confirmation')
                    <div class="text-start">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text inputTextIcon" id="search-addon"><i class="fa-solid fa-key"></i></span>
                    <input type="password" class="form-control inputTextField" placeholder="Re-Password" name="password_confirmation" value="{{ old('password_confirmation') }}">
                </div>

                <section class="p-2 text-center w-100">
                    <button type="submit" class="form-control btn btn-primary">Sign Up</button>
                </section>
            </form>
            <section class="p-2 text-end w-100">
                <a class="text-dark" href="{{ route('auth.forget') }}">Forgot password?</a>
            </section>

            <section class="p-2 text-center w-100">
                <a href="{{ route('auth.login') }}">
                    <button type="button" class="form-control btn btn-dark">Sign in to your account</button>
                </a>
            </section>
        </div>
    </div>
</div>
@endsection
