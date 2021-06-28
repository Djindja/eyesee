<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <button class="btn btn-primary btn-lg" onClick="window.open('{{url("game")}}', '_self');">Go to the list of all games</button>
        </div>
    </div>
</x-app-layout>