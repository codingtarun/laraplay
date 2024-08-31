<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-common.header />

<body>
    <div id="app">
        <x-common.navbar />
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>