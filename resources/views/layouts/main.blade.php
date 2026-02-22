<!DOCTYPE html>
<html lang="en">

@include('layouts.header')

<body>
    <div class="container-scroller">
        @include('layouts.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            @include('layouts.sidebar')
            @yield('content')
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    @include('layouts.scripts')
    <!-- End custom js for this page -->
</body>

</html>
