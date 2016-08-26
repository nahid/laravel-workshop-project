<!DOCTYPE html>
<html lang="en">

<head>

@include('site.partials.head')

</head>

<body>

<!-- Navigation -->
@include('site.partials.nav')

<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->


<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            @yield('container')
        </div>
    </div>
</div>

<hr>

<!-- Footer -->
@include('site.partials.footer')
</body>

</html>
