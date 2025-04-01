<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title> @yield('title') </title>
</head>

<body>
<div class="min-h-screen bg-gray-100">
    <x-header />

    <!-- Page Content -->
    <main>
        @yield('content')
    </main>

    <x-footer />
</body>
</div>
</html>

<!-- Scripts -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>