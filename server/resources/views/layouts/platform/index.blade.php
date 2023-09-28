<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>YB - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    <x-nav></x-nav>
    <main class="main-variant">
        <section class="container-platform">
            @yield('content')
        </section>
    </main>

</body>

{{-- style: layout da plataforma --}}

</html>
