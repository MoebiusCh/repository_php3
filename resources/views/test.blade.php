@extends('layout')
@section('content')
    <div class="rounded-lg bg-white px-6 py-8 shadow-xl ring-1 ring-slate-900/5 dark:bg-slate-800">
        <div>
            <span class="inline-flex items-center justify-center rounded-md bg-indigo-500 p-2 shadow-lg">
                <svg
                    class="h-6 w-6 text-white"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    aria-hidden="true"
                >
                    <!-- ... -->
                </svg>
            </span>
        </div>
        <h3 class="mt-5 text-base font-medium tracking-tight text-slate-900 dark:text-white">Writes Upside-Down</h3>
        <p class="mt-2 text-sm text-slate-500 dark:text-slate-400">
            The Zero Gravity Pen can be used to write in any orientation, including upside-down. It even works in outer
            space.
        </p>
    </div>

    <!-- You can actually customize padding on a select element: -->
    <select class="rounded-sm px-4 py-3">
        <option value="" selected>Your Choose</option>
    </select>

    <!-- Or change a checkbox color using text color utilities: -->
    <input type="checkbox" class="rounded text-pink-500" />

    <input type="email" class="form-input px-1 py-1" />

    <div class="w-1/2">
        <div class="aspect-h-1 aspect-w-2">
            <iframe
                src="https://www.youtube.com/embed/dQw4w9WgXcQ"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
            ></iframe>
        </div>
    </div>

    <div>
        <div class="flex items-center space-x-2 text-base">
            <h4 class="font-semibold text-slate-900">Contributors</h4>
            <span class="rounded-full bg-slate-100 px-2 py-1 text-xs font-semibold text-slate-700">204</span>
        </div>
        <div class="mt-3 flex -space-x-2 overflow-hidden">
            @foreach ($contributors as $user)
                <img
                    class="inline-block h-12 w-12 rounded-full ring-2 ring-white"
                    src="{{ $user['avatarUrl'] }}"
                    alt="{{ $user['handle'] }}"
                />
            @endforeach
        </div>
        <div class="mt-3 text-sm font-medium">
            <a href="#" class="text-blue-500">+ 198 others</a>
        </div>
    </div>

    <div class="text-3xl font-bold">Reuse Style</div>

    <!-- Before extracting a custom class -->
    <button
        class="rounded-full bg-violet-500 px-5 py-2 font-semibold text-white shadow-md hover:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-400 focus:ring-opacity-75"
    >
        Save changes
    </button>
    <!-- After extracting a custom class -->
    <button class="btn-primary">Save changes</button>

    @php
        // $message = 'Hello'; // test function shouldRender()
        $message = 'Hello World!';
    @endphp

    <x-package-input size="3xl" :message="$message" text-color="rose-600"></x-package-input>

    <x-forms.input size="3xl" :message="$message" text-color="rose-400"></x-forms.input>

    <x-forms::input size="3xl" :message="$message" text-color="rose-200"></x-forms::input>

    <button
        class="rounded-md bg-slate-500 p-2 text-white hover:bg-black dark:bg-slate-400 dark:text-black dark:md:hover:bg-white"
    >
        Save changes
    </button>

    <button class="rounded-md p-2 dark:md:hover:bg-fuchsia-600">Save changes</button>

    <ul role="list" class="divide-y divide-slate-200 p-6">
        @foreach ($contributors as $user)
            <!-- Remove top/bottom padding when first/last child -->
            <li class="flex py-4 first:pt-0 last:pb-0">
                <img class="h-10 w-10 rounded-full" src="{{ $user['avatarUrl'] }}" alt="" />
                <div class="ml-3 overflow-hidden">
                    <p class="text-sm font-medium text-slate-900">{{ $user['handle'] }}</p>
                    <p class="truncate text-sm text-slate-500">{{ $user['email'] }}</p>
                </div>
            </li>
        @endforeach
    </ul>

    @livewire('test.counter')
@endsection
