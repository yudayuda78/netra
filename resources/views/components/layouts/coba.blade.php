<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Livewire Page</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="p-6">

    {{ $slot }}

    @livewireScripts
</body>

</html>
