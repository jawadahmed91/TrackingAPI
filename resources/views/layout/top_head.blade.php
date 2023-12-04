@php
    $hide_top_nav = '';
@endphp
@if ($page_name == 'Login' || $page_name == 'Forget Password' || $page_name == 'Register')
    @php
        $hide_top_nav = 'd-none';
    @endphp
@endif
<style>
    
</style>
<div class="container-fluid bg-theme-primary {{ $hide_top_nav }}">
    <div class="row">
        <div class="col-2 text-start">
            <a href="#" id="sidenav-menu" class="btn btn-primary">
                <i class="fa-solid fa-bars-staggered text-white"></i>
            </a>
        </div>
        <div class="col-8 text-center">
            <a href="#" class="btn btn-primary">
                {{ $page_name }}
            </a>
        </div>
        <div class="col-2 text-end">
            <a href="#" class="btn btn-primary" style="--mdb-btn-padding-x: 1rem;">
                <i class="fa-solid fa-bell text-white"></i>
            </a>
        </div>
    </div>
</div>
