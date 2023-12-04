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

            @if ($message = Session::get('message'))
                <div class="alert alert-danger" role="alert" data-mdb-color="danger">
                    {{ $message }}
                </div>
            @endif
            
            <h2 class="pb-4">Company Profile Settings</h2>
            <form action="{{ route('account.update-company-profile') }}" method="post">
                @csrf

                @error('company_name')
                    <div class="text-start">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text inputTextIcon" id="search-addon"><i class="fa-solid fa-building"></i></span>
                    <input type="text" class="form-control inputTextField" placeholder="Company Name" name="company_name" value="{{ old('company_name', $admin_detail->company_name) }}">
                </div>

                @error('email')
                    <div class="text-start">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text inputTextIcon" id="search-addon"><i class="fa-solid fa-at"></i></span>
                    <input type="email" class="form-control inputTextField" placeholder="Email" name="email" value="{{ old('email', $admin_detail->email) }}">
                </div>

                @error('phone_number')
                    <div class="text-start">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text inputTextIcon" id="search-addon"><i class="fa-solid fa-phone"></i></span>
                    <input type="text" class="form-control inputTextField" placeholder="Phone Number" name="phone_number" value="{{ old('phone_number', $admin_detail->phone_number) }}">
                </div>

                @error('mobile_number')
                    <div class="text-start">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text inputTextIcon" id="search-addon"><i class="fa-solid fa-mobile-screen-button"></i></span>
                    <input type="text" class="form-control inputTextField" placeholder="Mobile Number" name="mobile_number" value="{{ old('mobile_number', $admin_detail->mobile_number) }}">
                </div>

                @error('business_number')
                    <div class="text-start">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text inputTextIcon" id="search-addon"><i class="fa-solid fa-phone-volume"></i></span>
                    <input type="text" class="form-control inputTextField" placeholder="Business Number" name="business_number" value="{{ old('business_number', $admin_detail->business_number) }}">
                </div>

                @error('invoice_tax')
                    <div class="text-start">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <span class="input-group-text inputTextIcon" id="search-addon"><i class="fa-solid fa-receipt"></i></span>
                    <input type="text" min="0" max="100" class="form-control inputTextField" placeholder="Tax" name="invoice_tax" value="{{ old('invoice_tax', floatval($invoice_taxes->invoice_tax)) }}">
                </div>

                <div class="input-group mb-3">
                    <textarea rows="6"  name="banking_detail" class="form-control trumbowyg textareField" style="height: 200px">{!! $admin_detail->banking_detail !!}</textarea>
                </div>

                <section class="p-2 mb-4 text-center w-100">
                    <button type="submit" class="form-control btn btn-primary">Update</button>
                </section>
            </form>
        </div>
    </div>
</div>
@endsection
