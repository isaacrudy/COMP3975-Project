{{-- @extends('layouts.master')
@section('content')
    <span style="font-size:xx-large;">Laravel Newsletter</span>

    <hr>

    <p><a href="{{ route('newsletters.index') }}">Newsletters</a></p>

    <hr>

    <p>Andrew Anca: &emsp; &emsp; A00991715</p>
    <p>Isaac Rudy: &emsp; &emsp; &emsp; A01261260</p>
    <p>Kasra Esfahanian: &emsp; A01306289</p>
    <p>Germanpreet Singh: A01312851</p>
@endsection --}}


@guest
    <x-guest-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                            in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <span style="font-size:xx-large;">Laravel Newsletter</span>

                        <hr>
                    
                        <p><a href="{{ route('newsletters.index') }}">Newsletters</a></p>
                    
                        <hr>
                    
                        <p>Andrew Anca: &emsp; &emsp; A00991715</p>
                        <p>Isaac Rudy: &emsp; &emsp; &emsp; A01261260</p>
                        <p>Kasra Esfahanian: &emsp; A01306289</p>
                        <p>Germanpreet Singh: A01312851</p>
                    </div>
                </div>
            </div>
        </div>
    </x-guest-layout>
@endguest
@auth
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <span style="font-size:xx-large;">Laravel Newsletter</span>

                        <hr>
                    
                        <p><a href="{{ route('newsletters.index') }}">Newsletters</a></p>
                    
                        <hr>
                    
                        <p>Andrew Anca: &emsp; &emsp; A00991715</p>
                        <p>Isaac Rudy: &emsp; &emsp; &emsp; A01261260</p>
                        <p>Kasra Esfahanian: &emsp; A01306289</p>
                        <p>Germanpreet Singh: A01312851</p>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@endauth
