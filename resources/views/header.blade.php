<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    @vite(['resources/css/output.css', 'resources/js/app.js'])
    <!-- Styles -->
</head>


<body class="overflow-x-hidden">
    <header class="bg-black">
        <nav class="flex justify-between mx-52 text-slate-400 py-4">
            <div class="left flex content-center place-items-center space-x-10">
                <div class="hover:text-slate-50">
                    <a href="/home">
                        Logo
                    </a>
                </div>
                <div class="hover:text-slate-50">
                    <a href="/home">
                        Trang chủ
                    </a>
                </div>
                <div class="hover:text-slate-50">
                    <a href="">
                        Khám phá
                    </a>
                </div>
                <div class="hover:text-slate-50">
                    <a href="">
                        Phản hồi
                    </a>
                </div>
            </div>
            <div class="right flex content-center place-items-center space-x-2">
                <div class="flex place-items-center">
                    <input type="text" name="" id="" placeholder="Tìm kiếm..." class="rounded-l-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-10 bg-white rounded-r-lg cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>

                </div>
                <div class="bg-[#2a2a2a] rounded-lg flex p-2 space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 fill-white cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z" />
                    </svg>
                    <div class="hover:text-slate-50">
                        <div class="flex">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke-width="1.5" stroke="currentColor"
                                class="w-6 h-6 cursor-pointer hover:fill-white">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
