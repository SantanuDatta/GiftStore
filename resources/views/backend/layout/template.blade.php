<!doctype html>
<html lang="en" class="semi-dark">

<head>
    @include('backend.includes.header')
    <!--plugins-->
    @include('backend.includes.css')
</head>

<body>
    <!--start wrapper-->
    <div class="wrapper">
        <!--start top header-->
        @include('backend.includes.navbar')
        <!--end top header-->

        <!--start sidebar -->
        @include('backend.includes.sidebar')
        <!--end sidebar -->

        <!--start content-->
        <main class="page-content">
            @yield('body-content')
        </main>
        <!--end page main-->

        <!--Start Back To Top Button-->
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
    </div>
    <!--end wrapper-->
    @include('backend.includes.script')
</body>

</html>
