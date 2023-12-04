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

            <div class="card mb-2">
               <div class="card-header">
                    <h5 class="card-title float-start">List Trackings</h5>

                    <a href="{{ route('tracking.tracking-create') }}" class="card-title float-end edit-input btn btn-primary btn-sm">
                        <i class="fa-solid fa-circle-plus"></i>
                    </a>
               </div>
            </div>


            <style>
                .payroll_para
                {
                    font-size: 11px;
                    line-height: 0;
                }
                .payroll_btn
                {
                    font-size: 9px;
                }
            </style>

            @forelse ($all_trackings as $all_tracking)
                <div class="col-12">
                        <div class="alert alert-light" role="alert" data-mdb-color="light" >
                            <p class="payroll_para float-start"><i class="fa-solid fa-calendar"></i> {{ \Carbon\Carbon::parse($all_tracking->created_at)->diffForHumans() }}</p>

                                {{-- <i class="fa-solid fa-angle-right right-arrow float-end"></i> --}}
                            </p>

                            <div class="clear">
                                {!! $all_tracking->tracking_content !!}
                            </div>
                            <div class="row">
                                <div class="col-8"></div>
                                <div class="col-2 text-end">
                                    <a href="{{ route('tracking.tracking-edit', ['id' => $all_tracking->id]) }}" class="btn btn-primary btn-sm border-radius-30">Edit</a>
                                </div>
                                <div class="col-2">
                                    <form action="{{ route('tracking.delete-tracking', ['id' => $all_tracking->id]) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-dark btn-sm border-radius-30">Delete</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                </div>
            @empty
                <div class="row alert alert-light p-0 pt-2 m-0 mb-2" role="alert" data-mdb-color="light">
                    <div class="col-12 text-start ps-4">
                        <h5>No Record Found!</h5>
                    </div>
                </div>
            @endforelse

        </div>
    </div>
@endsection
