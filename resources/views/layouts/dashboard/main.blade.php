@extends('layouts.app')
@section('main')
@include('layouts.dashboard.nav')
@include('layouts.dashboard.footer')
@yield('navegation')
@yield('content')
@yield('footer')
@endsection
