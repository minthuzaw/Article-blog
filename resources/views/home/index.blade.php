@extends('layouts.app')

@section('css-content')
    <link rel="stylesheet" href="{{ asset('css/boxicon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/template.css') }}">
@endsection

@section('content')

    <!-- Start Banner Hero -->
    <x-image-banner/>
    <!-- End Banner Hero -->

    <!-- Start Service -->
    <x-services/>
    <!-- End Service -->

    <!-- Start Recent Work -->
    <x-recent-work/>
    <!-- End Recent Work -->
@endsection

@push('js-content')
    <script>
        $(window).load(function () {
            // init Isotope
            var $projects = $('.projects').isotope({
                itemSelector: '.project',
                layoutMode: 'fitRows'
            });
            $(".filter-btn").click(function () {
                var data_filter = $(this).attr("data-filter");
                $projects.isotope({
                    filter: data_filter
                });
                $(".filter-btn").removeClass("active");
                $(".filter-btn").removeClass("shadow");
                $(this).addClass("active");
                $(this).addClass("shadow");
                return false;
            });
        });
    </script>
@endpush
