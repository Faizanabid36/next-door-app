@include('layouts.header')
@include('layouts.sidebar')
{{-- admin --}}
@yield('main_page')
@yield('users_list')

{{-- user --}}
@yield('user_main_page')

@include('layouts.footer')
