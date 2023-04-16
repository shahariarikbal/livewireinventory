<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/style.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
{{--            @if (isset($header))--}}
{{--                <header class="bg-white shadow">--}}
{{--                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">--}}
{{--                        {{ $header }}--}}
{{--                    </div>--}}
{{--                </header>--}}
{{--            @endif--}}

            <!-- Page Content -->

            <div class="left_menu">
                <div class="leftmenu_wrapper">
                    <ul>
                        <li class="menu_items active">
                            <a href="#"><img class="active" src="{{ asset('/backend/') }}/img/home.svg" alt="" /></a
                            ><span>Dashboard</span>
                        </li>
                        <li class="menu_items">
                            <a href="#"><img src="{{ asset('/backend/') }}/img/layouts.svg" alt="" /></a
                            ><span>Layouts</span>
                        </li>
                        <li class="menu_items">
                            <a href="#"><img src="{{ asset('/backend/') }}/img/calender.svg" alt="" /></a
                            ><span>Calender</span>
                        </li>
                        <li class="menu_items">
                            <a href="#"><img src="{{ asset('/backend/') }}/img/chat.svg" alt="" /></a
                            ><span>Chat</span>
                        </li>
                        <li class="menu_items">
                            <a href="#"><img src="{{ asset('/backend/') }}/img/layers.svg" alt="" /></a
                            ><span>Ecommerce</span>
                        </li>
                        <li class="menu_items">
                            <a href="#"><img src="{{ asset('/backend/') }}/img/clipboard.svg" alt="" /></a
                            ><span>Invoices</span>
                        </li>
                        <li class="menu_items">
                            <a href="#"><img src="{{ asset('/backend/') }}/img/contacts.svg" alt="" /></a
                            ><span>Contacts</span>
                        </li>
                        <li class="menu_items">
                            <a href="#"><img src="{{ asset('/backend/') }}/img/Table.svg" alt="" /></a
                            ><span>Athentication</span>
                        </li>
                        <li class="menu_items">
                            <a href="#"><img src="{{ asset('/backend/') }}/img/bag.svg" alt="" /></a
                            ><span>Utility</span>
                        </li>
                        <li class="menu_items">
                            <a href="#"><img src="{{ asset('/backend/') }}/img/Leaderbord.svg" alt="" /></a
                            ><span>Forms</span>
                        </li>
                        <li class="menu_items">
                            <a href="#"><img src="{{ asset('/backend/') }}/img/Table.svg" alt="" /></a
                            ><span>Tables</span>
                        </li>
                        <li class="menu_items">
                            <a href="#"><img src="{{ asset('/backend/') }}/img/map.svg" alt="" /></a
                            ><span>Maps</span>
                        </li>
                    </ul>

                    <div class="menu_bottom">
{{--                        <div class="userprofile_name">--}}
{{--                            <div class="userlogo">--}}
{{--                                <img src="{{ asset('/backend/') }}/img/userlogo.svg" alt="userlogo" />--}}
{{--                            </div>--}}
{{--                            <div class="username">--}}
{{--                                <span>--}}
{{--                                    @if(auth()->guard('admin')->check())--}}
{{--                                        {{ auth()->guard('admin')->user()->name }}--}}
{{--                                    @else--}}
{{--                                        {{ auth()->guard('web')->user()->name }}--}}
{{--                                    @endif--}}
{{--                                </span>--}}
{{--                                <span style="cursor: pointer; font-weight: 600">...</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="logoubutton">--}}
{{--                            <div class="logout">--}}
{{--                                <img src="{{ asset('/backend/') }}/img/logout.svg" alt="" />--}}
{{--                            </div>--}}
{{--                            <span>--}}
{{--                                <x-dropdown-link href="{{ route('logout') }}"--}}
{{--                                                 @click.prevent="$root.submit();" title="Logout">--}}
{{--                            </x-dropdown-link>--}}
{{--                                Logout--}}
{{--                            </span>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
            <root>
                <section class="section1">
                    {{ $slot }}
                </section>
            </root>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
