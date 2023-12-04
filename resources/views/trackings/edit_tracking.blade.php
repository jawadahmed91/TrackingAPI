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


            <h2 class="pb-4">Edit Tracking</h2>
            <form action="{{ route('tracking.update-tracking', ['id' => $tracking->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                @error('tracking_content')
                    <div class="text-start">
                        <span class="text-danger">{{ $message }}</span>
                    </div>
                @enderror
                <div class="input-group mb-3">
                    <textarea rows="6"  name="tracking_content" class="form-control trumbowyg">{{ old('tracking_content', $tracking->tracking_content) }}</textarea>
                </div>

                <section class="p-2 mb-4 text-center w-100">
                    <button type="submit" class="form-control btn btn-primary">Update Tracking</button>
                </section>
            </form>
        </div>
    </div>
</div>
@endsection
