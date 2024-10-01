<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-common.header />

<body>
    <div id="app">
        <x-common.navbar />
        <x-common.alert />
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <!-- Footer Scripts -->
    <!-- Summernote Script CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js" integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Select2 Script CDN -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</body>

</html>