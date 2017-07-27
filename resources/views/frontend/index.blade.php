@extends('frontend.layout')

@section('title', 'Ticketing Solutions')

@section('content')

@stop

@section('footer.scripts')
    <script src="{{ asset('frontend/js/common_scripts_min.js') }}"></script>
    <script src="{{ asset('frontend/js/functions.js') }}"></script>

    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script src="{{ asset('frontend/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
    <script src="{{ asset('frontend/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
    <script src="{{ asset('frontend/js/revolution_func.js') }}"></script>

    <script src="{{ asset('frontend/js/tabs.js') }}"></script>
    <script>new CBPFWTabs(document.getElementById('tabs'));</script>
@stop