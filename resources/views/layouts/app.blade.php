<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Tambahkan link CSS, JavaScript, atau meta tags lainnya yang diperlukan -->
</head>

<body>
    <!-- Tambahkan markup header, content, dan footer sesuai dengan kebutuhan Anda -->
    <div class="bg-base-100 drawer drawer-mobile">
        <input id="drawer" type="checkbox" class="drawer-toggle">
        <div class="drawer-content h-screen flex flex-col">
            @include('include.navbar')
            <div class="px-6 pb-16 flex-grow">
                <div class="flex flex-col-reverse justify-between gap-6 xl:flex-row">
                    @yield('content')
                </div>
            </div>
            @include('include.footer')
        </div>
        <div class="drawer-side">
            <label for="drawer" class="drawer-overlay"></label>
            @include('include.sidebar')
        </div>
    </div>

    @stack('custom-scripts')
</body>

</html>
