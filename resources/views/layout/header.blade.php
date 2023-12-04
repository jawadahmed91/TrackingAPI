<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page_title')</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />

		{{-- <link rel="stylesheet" href="/css/bootstrap-material-datetimepicker.css" /> --}}
    <link rel="stylesheet" href="/trumbowyg/dist/ui/trumbowyg.min.css">
    <link rel="stylesheet" href="/css/jquerysctipttop.css">
    <link rel="stylesheet" href="/css/next-sidebar.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<div class="sidebar" style="left: -280px">
    <div class="sidebar-inner">
      <div class="sidebar-logo">
        <div class="d-flex align-items-center flex-nowrap">
          <a class="sidebar-link text-decoration-none" href="#">
            <div class="d-flex align-items-center flex-nowrap">
              <div class="">
                <div class="logo d-flex align-items-center justify-content-center">
                  Tracking API
                </div>
              </div>
            </div>
          </a>
          <div id="close-sidenav-menu">
            <div class="sidebar-toggle">
              <a href="#" class="text-decoration-none">
                <i class="far fa-times-circle"></i>
              </a>
            </div>
          </div>
        </div>
      </div>

      <ul class="sidebar-menu scrollable position-relative pt-3">

        <li class="nav-item dropdown">
          <a class="nav-link wave-effect" href="{{ route('setting') }}">
            <span class="icon-holder">
              <i class="fas fa-cog"></i>
            </span>
            <span class="title">Account</span>
          </a>
        </li>

        <li class="nav-item dropdown">
            <a class="nav-link wave-effect" href="{{ route('tracking.trackings') }}">
              <span class="icon-holder">
                <i class="fas fa-cog"></i>
              </span>
              <span class="title">Trackings</span>
            </a>
          </li>



        <li class="nav-item dropdown">
            <a class="nav-link wave-effect" href="{{ route('auth.logout') }}">
              <span class="icon-holder">
                <i class="fas fa-sign-out-alt"></i>
              </span>
              <span class="title">Logout</span>
            </a>
        </li>



      </ul>
    </div>
</div>
