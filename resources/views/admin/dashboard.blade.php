@extends('admin.layout')
@section('title', 'Dashboard')
@section('content')
    <div class="min-h-dvh p-4 sm:ml-64">
        <article class="text-black">
            <h1 class="text-3xl font-bold">Dashboard</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-lg font-semibold">Người dùng</h2>
                    <p class="text-2xl">{{ $usersCount }}</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-lg font-semibold">Đơn hàng</h2>
                    <p class="text-2xl">{{ $ordersCount }}</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-lg font-semibold">Sản phẩm</h2>
                    <p class="text-2xl">{{ $productsCount }}</p>
                </div>
                <div class="bg-white p-4 rounded shadow">
                    <h2 class="text-lg font-semibold">Doanh thu</h2>
                    <p class="text-2xl">{{ number_format($totalRevenue, 2, ',', '.') }}
                        <sup>đ</sup>
                    </p>
                </div>
            </div>
        </article>
    </div>
@endsection
