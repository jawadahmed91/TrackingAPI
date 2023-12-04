@include('layout.header')
<body>
    @include('layout.top_head')
    @yield('content')
    @include('layout.footer')
    @yield('scripts')
</body>
</html>
