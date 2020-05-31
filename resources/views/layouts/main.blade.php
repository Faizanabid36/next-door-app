@include('layouts.header')
@include('layouts.sidebar')
{{-- user --}}
@yield('body_content')
{{-- admin --}}
@yield('add_cat')
@yield('view_cat')
@include('layouts.footer')

