@extends('layout.main')

@section('page_title')
    {{ $page_name }}
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row">

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert" data-mdb-color="success">
                    {{ $message }}
                </div>
            @endif

            <div class="card">
               <div class="card-header">
                    <h5 class="card-title float-start">Settings</h5>

                    <a href="{{ route('account.company-profile-edit') }}" class="card-title float-end edit-input btn btn-primary btn-sm">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
               </div>

                <div class="card-body">
                    <div>
                        <h5 class="card-title">Name</h5>
                        <p class="card-text">
                            {{ $admin_detail->company_name }}
                        </p>
                    </div>
                    <div class="clear">&nbsp;</div>

                    <div>
                        <h5 class="card-title">Email</h5>
                        <p class="card-text">
                            {{ $admin_detail->email }}
                        </p>
                    </div>
                    <div class="clear">&nbsp;</div>

                    <div>
                        <h5 class="card-title">Phone Number</h5>
                        <p class="card-text">
                            {{ $admin_detail->phone_number }}
                        </p>
                    </div>
                    <div class="clear">&nbsp;</div>

                    <div>
                        <h5 class="card-title">Mobile Number</h5>
                        <p class="card-text">
                            {{ $admin_detail->mobile_number }}
                        </p>
                    </div>
                    <div class="clear">&nbsp;</div>

                    <div>
                        <h5 class="card-title">Business Number</h5>
                        <p class="card-text">
                            {{ $admin_detail->business_number }}
                        </p>
                    </div>
                    <div class="clear">&nbsp;</div>

                    <div>
                        <h5 class="card-title">Tax</h5>
                        <p class="card-text">
                            ${{ $invoice_taxes->invoice_tax }}%
                        </p>
                    </div>
                    <div class="clear">&nbsp;</div>

                    <div>
                        <h5 class="card-title">Banking Details</h5>
                        <div class="card-text">
                            {!! $admin_detail->banking_detail !!}
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
