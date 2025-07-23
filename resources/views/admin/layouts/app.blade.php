<!DOCTYPE html>
<html>
<head>
    <title>Admin | @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    @include('admin.partials.navbar')
    <div class="container-fluid">
        <div class="row">
            @include('admin.partials.sidebar')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
