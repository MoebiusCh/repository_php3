@extends('layout')

@section('title', 'Chi tiết sản phẩm')

@section('content')
    <main class="mx-52 min-h-dvh">
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="{{ route('shop') }}">Shop</a></li>
                <li>Product 1</li>
            </ul>
        </div>

        <div class="grid-cols-product-box mt-section-space grid gap-16">
            <div class="grid grid-cols-1 gap-y-2">
                <div>
                    <img class="w-full h-72" src="{{ asset('storage/' . $product->image) }}" alt="" />
                </div>
                <div class="grid grid-cols-4 gap-x-2">
                    <img class="" src="{{  asset('storage/' . $product->image) }}" alt="" />
                    <img class="" src="{{  asset('storage/' . $product->image) }}" alt="" />
                    <img class="" src="{{  asset('storage/' . $product->image) }}" alt="" />
                    <img class="" src="{{  asset('storage/' . $product->image) }}" alt="" />
                </div>
            </div>

            <div class="col-start-2 grid">
                <div>
                    <span class="text-uppercase badge badge-error text-white">yêu thích</span>
                    <span class="font-bold">{{ $product->title }}</span>
                </div>
                <div>
                    <span class="bg-gray my-3 h-px text-gray-400 line-through">{{ $product->price }} <sup>đ</sup></span>
                    <span class="bg-gray my-3 h-px">{{ $product->price }} <sup>đ</sup></span>
                </div>
                <div>
                    <span>
                        <form class="">
                            <div class="input-group mb-2 flex">
                                <label for="quantity-input" class="mb-2 block text-sm font-medium">Số lượng:</label>
                                <input type="number" name="quantity" id="quantity-input" value="0"
                                    class="input input-bordered w-full max-w-xs" />
                            </div>
                            <div class="flex">
                                <button class="btn">Thêm vào giỏ hàng</button>
                                <button class="btn">Mua ngay</button>
                            </div>
                        </form>
                    </span>
                </div>
            </div>
        </div>
    </main>
@endsection
