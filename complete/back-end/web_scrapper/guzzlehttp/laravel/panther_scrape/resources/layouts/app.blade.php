<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scraper</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

    @livewireStyles

</head>
<body>
<div class="container mx-auto">

    <header class="bg-gray-400 flex justify-start pt-4 pb-4 space-x-4 shadow mb-4">
        <a href="{{ url('/') }}" class="ml-4 bg-red-700 p-2 text-white rounded hover:bg-black">All Products</a>
        <a href="{{ url('/scrape') }}" class="bg-green-800 p-2 text-white rounded hover:bg-black">Scrape</a>
    </header>
    {{ $slot }}
</div>

@livewireScripts
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

@stack('scripts')
</body>
</html>
