@extends('layouts.app')
@section('main')
@include('layouts.dashboard.nav')
@include('layouts.dashboard.footer')
<div class="page-wrapper chiller-theme sidebar-bg bg1 toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
@yield('navegation')
<main class="page-content">
asd
</main>
    </div>
@endsection
