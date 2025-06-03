<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
</head>

<body class="bg-[#FDFDFC] text-[#1b1b18] flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col">
    <div class="flex items-center justify-center min-h-screen overflow-hidden">
        <main class="flex flex-col-reverse items-center justify-center w-full max-w-7xl px-4 py-8 lg:flex-row">
            <a href="{{ route('login') }}">
                <img src="{{ asset('storage/banners/home.png') }}" alt="Inventory Management Banner"
                    style="width: 70%; height: auto;" />
            </a>
        </main>
    </div>
    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</body>

</html>
