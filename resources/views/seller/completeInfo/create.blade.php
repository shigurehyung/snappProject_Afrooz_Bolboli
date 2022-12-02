<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>تکمیل اطلاعات </title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <nav x-data="{ open: false }" class="bg-pink-100 border-b border-gray-100">
        <!-- Primary Navigation Menu -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <!-- Logo -->
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                        </a>
                    </div>

                    <!-- Settings Dropdown -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div>{{ Auth::user()->name }}</div>

                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <x-dropdown-link class="text-right" :href="route('logout')" onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __(' خروج') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Responsive Navigation Menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                </div>

                <!-- Responsive Settings Options -->
                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('خروج') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            </div>
    </nav>

    <div class="min-h-screen bg-pink-100">

        <!-- Page Heading -->
        @if (isset($header))
        <header class="bg-pink-600 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endif

        <!-- Page Content -->
        <main>

            <h2 class="font-semibold text-xl text-white bg-pink-600 p-10 leading-tight text-center">
                {{ __('درخواست ورود به پنل رستوراندار یا فروشنده') }}
            </h2>


            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 text-center">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            برای ورود به پنل این اطلاعات را باید کامل کنید
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-center pt-10">
                <form action="/seller/completeInfo" method="post" s>
                    @csrf
                    <div class="block text-center">

                        <input type="text" class="block shadow-5xl mb-5 p-2 w-80 italic text-right placeholder-pink-400" name="name" placeholder="نام رستوران">

                        <div class="flex justify-center space-x-5 mb-5">
                            @foreach($categories as $category)
                            <input type="checkbox" value="{{$category->title}}" name="categories[]" class="rounded bg-gray-100 focus:ring-pink-500 text-pink-500">
                            <label>{{$category->title}}</label><br>
                            @endforeach
                        </div>

                        <input type="text" class="block shadow-5xl mb-5 p-2 w-80 italic text-right placeholder-pink-400" name="phone" placeholder="شماره تماس">

                        <label class="text-xl">مختصات جغرافیایی</label><br>
                        <div class="flex row">
                            <div class="col">
                                <input type="text" class="block shadow-5xl mb-10 w-20 mx-10 italic text-right placeholder-pink-400" name="latitude" placeholder="عرض">
                            </div>

                            <div class="col">
                                <input type="text" class="block shadow-5xl mb-10 p-2 w-20 italic text-right placeholder-pink-400" name="longitude" placeholder="طول">
                            </div>
                        </div>


                        <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic text-right placeholder-pink-400" name="address" placeholder="آدرس">

                        <input type="text" class="block shadow-5xl mb-10 p-2 w-80 italic text-right placeholder-pink-400" name="accountNumber" placeholder="شماره حساب">

                        <button type="submit" class="bg-pink-600 rounded block shadow-5xl mb-10 p-2 w-80 rounded font-bold text-white">
                            ثبت و بعدی
                        </button>
                    </div>
                </form>
            </div>
            @if ($errors->any())
            <div class="w-4/8 m-auto text-center">
                @foreach($errors->all() as $error)
                <li class="text-red-500 list-none">
                    {{$error}}
                </li>
                @endforeach
            </div>
            @endif
        </main>
    </div>
</body>

</html>