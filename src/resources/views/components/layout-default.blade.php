<!DOCTYPE html>
@php($app = config('app.name', 'Laravel'))
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ isset($title) ? "{$title} - {$app}" : $app }}</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="L4D2 Stats">
    <meta name="keywords" content="L4D2,Stats">

    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('site.webmanifest')}}">

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>
<body class="bg-white dark:bg-slate-900">
<nav class="bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 sm:p-6">
        <div class="flex items-center">
            <img
                class="h-8 w-8 mr-3"
                src="{{asset('storage/logo.svg')}}"
                alt="{{ $app }} Logo"
                width="64" height="64"
            />
            <span
                class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">{{ $app }}</span>
        </div>
        <button data-collapse-toggle="navbar-default" onclick="ToggleMenu()" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-slate-400 rounded-lg md:hidden hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-slate-200 dark:text-slate-400 dark:hover:bg-slate-700 dark:focus:ring-slate-600"
                aria-controls="navbar-default" aria-expanded="false"
        >
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-slate-100 rounded-lg bg-slate-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-slate-800 md:dark:bg-slate-900 dark:border-slate-700">
                <li>
                    @if (request()->is('/'))
                        <apan
                            class="block py-2 pl-3 pr-4 md:p-0 rounded dark:text-white text-white bg-blue-700 md:bg-transparent md:text-blue-700 md:dark:text-blue-500"
                        >
                            Home
                        </apan>
                    @else
                        <a
                            class="block py-2 pl-3 pr-4 md:p-0 rounded dark:text-white text-slate-900 hover:bg-slate-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:dark:hover:text-blue-500 dark:hover:bg-slate-700 dark:hover:text-white md:dark:hover:bg-transparent"
                            href="{{ route('stats.index') }}"
                        >
                            Home
                        </a>
                    @endif

                </li>
            </ul>
        </div>
    </div>
</nav>
{{ $slot }}
<footer class="bg-white dark:bg-slate-900">
    <div class="mx-auto max-w-screen-xl p-4 sm:p-6">
        <div class="text-center text-slate-900 dark:text-white">
            Created with ❤️ by TouchMe
        </div>
    </div>
</footer>
<script>
    function ToggleMenu() {
        const navbar = document.getElementById("navbar-default");
        navbar.classList.contains("hidden") ? navbar.classList.remove("hidden") : navbar.classList.add("hidden");
    }
</script>
</body>
</html>
