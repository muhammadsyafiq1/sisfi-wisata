@include('includes.styles')

  <body>
    <div class="page-dashboard">
        <div class="d-flex" id="wrapper" data-aos="fade-right">
            <!-- sidebar -->
            @include('includes.sidebar')
            <!-- page-content -->
            <div id="page-content-wrapper">
                @include('includes.nav')
                @yield('content')
            </div>
        </div>
    </div>
@include('includes.scripts')

@stack('scripts')
