<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ appName() }} | @yield('title')</title>
    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="author" content="@yield('meta_author', 'EverCrystal IT Solution')">
    @yield('meta')
    <style>
        body{
            font-size: 0.875rem !important;
        }
    </style>
    @stack('before-styles')
    <link href="{{ asset('css/backend.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/backend.css') }}" rel="stylesheet">
    <!-- custom -->
    <link href="{{ asset('assets/plugins/backend/dist/css/adminlte.min.css') }}" rel="stylesheet">
    {{ style('assets/plugins/waitme/waitMe.min.css') }}
    <!-- custom -->
    <livewire:styles />
    @stack('after-styles')
    {{--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4-4.1.1/jszip-2.5.0/dt-1.10.18/b-1.5.2/b-colvis-1.5.2/b-flash-1.5.2/b-html5-1.5.2/b-print-1.5.2/r-2.2.2/rg-1.0.3/rr-1.2.4/sc-1.5.0/datatables.min.css"/>--}}
</head>
<body class="c-app">
    @include('backend.includes.sidebar')

    <div class="c-wrapper c-fixed-components">
        @include('backend.includes.header')
        @include('includes.partials.read-only')
        @include('includes.partials.logged-in-as')
        {{--@include('includes.partials.announcements')--}}

        <div class="c-body">
            <main class="c-main">
                <div class="container-fluid">
                    <div class="fade-in">
                        @include('includes.partials.messages')
                        @yield('content')
                    </div><!--fade-in-->
                </div><!--container-fluid-->
            </main>
        </div><!--c-body-->

        @include('backend.includes.footer')
    </div><!--c-wrapper-->

    @stack('before-scripts')
    
    <script src="{{ asset('js/manifest.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/backend.js') }}"></script>
    <script src="{{ asset('js/plugin.js') }}"></script>
    {{ script('assets/plugins/waitme/waitMe.min.js')}}
    <script type="text/javascript">
        function run_waitMe() {
            $('body').waitMe({
                effect: 'win8',
                text: 'Please Wait..',
                bg: 'rgba(255,255,255,0.7)',
                color: '#000',
                sizeW: '',
                sizeH: ''
            });
        }
        function stop_waitMe() {
            $('body').waitMe('hide');
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <livewire:scripts />
    {{--<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>--}}
    
    @stack('after-scripts')
</body>
</html>
