<!DOCTYPE html>
<html lang="it">
<head>
    {{-- cooky police iubenda --}}
    <script type="text/javascript" src="https://embeds.iubenda.com/widgets/0b87de5c-cd44-4773-81d6-1a70c8c137ad.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Air Quality</title>
    {{-- direttiva blade @vite() per css --}}
    @vite(['resources/css/app.css'])
    {{-- assest Livewire --}}
    @livewireStyles
</head>
<body>
    
            {{-- Inizo Navbar --}}
      <x-navbar/>
   <div id="helperOverlay"></div>
    
<div id="focusOverlay"></div>
    <div id="overlay"></div>

<div id="loader" class="loaderContainer">
    <div class="loader"></div>
</div>

    
    {{-- Contenuto Layout --}}
    {{$slot}}
    <x-helper></x-helper>

<x-footer/>
    {{-- direttiva blade @vite() per js --}}
    @vite(['resources/js/app.js'])
        {{-- assest Livewire --}}
    @livewireScripts
</body>
</html>