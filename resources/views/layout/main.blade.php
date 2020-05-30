@include('layout.header')
@include('layout.sidebar')
{{-- admin --}}
@yield('main_page')
@yield('users_list')

{{-- user --}}
@yield('user_main_page')

@include('layout.footer')