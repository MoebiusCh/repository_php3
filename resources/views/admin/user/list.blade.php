@extends('admin.layout')

@section('title', 'Danh sách người dùng')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="min-h-dvh p-4 sm:ml-64">
            <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400 rtl:text-right">
                <thead class="bg-gray-50 text-xs uppercase text-gray-700 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">User name</th>
                        <th scope="col" class="px-6 py-3">Color</th>
                        <th scope="col" class="px-6 py-3">Category</th>
                        <th scope="col" class="px-6 py-3">Price</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="border-b odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                    >
                        <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                            Apple MacBook Pro 17"
                        </th>
                        <td class="px-6 py-4">Silver</td>
                        <td class="px-6 py-4">Laptop</td>
                        <td class="px-6 py-4">$2999</td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                        </td>
                    </tr>
                    <tr
                        class="border-b odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                    >
                        <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                            Microsoft Surface Pro
                        </th>
                        <td class="px-6 py-4">White</td>
                        <td class="px-6 py-4">Laptop PC</td>
                        <td class="px-6 py-4">$1999</td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                        </td>
                    </tr>
                    <tr
                        class="border-b odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                    >
                        <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                            Magic Mouse 2
                        </th>
                        <td class="px-6 py-4">Black</td>
                        <td class="px-6 py-4">Accessories</td>
                        <td class="px-6 py-4">$99</td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                        </td>
                    </tr>
                    <tr
                        class="border-b odd:bg-white even:bg-gray-50 dark:border-gray-700 odd:dark:bg-gray-900 even:dark:bg-gray-800"
                    >
                        <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                            Google Pixel Phone
                        </th>
                        <td class="px-6 py-4">Gray</td>
                        <td class="px-6 py-4">Phone</td>
                        <td class="px-6 py-4">$799</td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="whitespace-nowrap px-6 py-4 font-medium text-gray-900 dark:text-white">
                            Apple Watch 5
                        </th>
                        <td class="px-6 py-4">Red</td>
                        <td class="px-6 py-4">Wearables</td>
                        <td class="px-6 py-4">$999</td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 hover:underline dark:text-blue-500">Edit</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
