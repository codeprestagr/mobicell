<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Tabler Icons CDN -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">

        <!-- Scripts -->
        @vite(['resources/css/front/css/tailwind.css'])
    </head>
    <body>


    <section class="bg-white">
        <div class="grid grid-cols-1 lg:grid-cols-2">
            <div class="flex items-center justify-center px-4 py-7 bg-white sm:px-6 lg:px-8 sm:py-16 lg:py-24">
                <div class="xl:w-full xl:max-w-sm 2xl:max-w-md xl:mx-auto">


                    <a href="{{route('login')}}">
                        <img style="height: 50px;"  src="{{ asset('images/logo.png') }}" alt="Logo">
                    </a>





                    {{ $slot }}




                </div>
            </div>

            <div
                class="relative flex items-end px-4 pb-10 pt-60 sm:pb-16 md:justify-center lg:pb-24 bg-cover bg-center sm:px-6 lg:h-screen lg:px-8 bg-[url('../images/bg.png')]">
                <div class="absolute inset-0 bg-gradient-to-t from-sky-900 to-transparent"></div>

                <div class="relative">
                    <div class="w-full max-w-xl xl:w-full xl:mx-auto xl: pe-24 xl:max-w-xl">
                        <h3 class="text-4xl font-bold text-white">
                            {{ __('Complete management for your eShop.') }}
                        </h3>
{{--                        <ul class="grid grid-cols-1 mt-10 sm:grid-cols-2 gap-x-8 gap-y-4">--}}
{{--                            <li class="flex items-center space-x-3">--}}
{{--                                <i class="ti ti-circle-check-filled text-2xl text-sky-500"></i>--}}
{{--                                <span class="text-lg font-medium text-white"> Commercial License </span>--}}
{{--                            </li>--}}
{{--                            <li class="flex items-center space-x-3">--}}
{{--                                <i class="ti ti-circle-check-filled text-2xl text-sky-500"></i>--}}
{{--                                <span class="text-lg font-medium text-white"> Unlimited Exports </span>--}}
{{--                            </li>--}}
{{--                            <li class="flex items-center space-x-3">--}}
{{--                                <i class="ti ti-circle-check-filled text-2xl text-sky-500"></i>--}}
{{--                                <span class="text-lg font-medium text-white"> 120+ Coded Blocks </span>--}}
{{--                            </li>--}}
{{--                            <li class="flex items-center space-x-3">--}}
{{--                                <i class="ti ti-circle-check-filled text-2xl text-sky-500"></i>--}}
{{--                                <span class="text-lg font-medium text-white"> Design Files Included </span>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>



    </body>

    @vite(['resources/js/front/js/preline.js'])

</html>
