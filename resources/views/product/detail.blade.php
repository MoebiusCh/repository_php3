@extends('layout')

@section('title', 'Chi tiết sản phẩm')

@section('content')
    <main class="mx-52">
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a>Nhạc 1</a></li>
                <li>Product 1</li>
            </ul>
        </div>

        <div class="grid-cols-product-box mt-section-space grid gap-16">
            <div class="grid grid-cols-1 gap-y-2">
                <div>
                    <img
                        class="w-full"
                        src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg"
                        alt=""
                    />
                </div>
                <div class="grid grid-cols-4 gap-x-2">
                    <img
                        class=""
                        src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg"
                        alt=""
                    />
                    <img
                        class=""
                        src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg"
                        alt=""
                    />
                    <img
                        class=""
                        src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg"
                        alt=""
                    />
                    <img
                        class=""
                        src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg"
                        alt=""
                    />
                </div>
            </div>

            <div class="col-start-2">
                <div>
                    <span class="text-uppercase badge badge-error text-white">yêu thích</span>
                    <span class="font-bold">Giày cực đẹp</span>
                </div>
                <div>
                    <span class="bg-gray my-3 h-px text-gray-400 line-through">2.000.000đ</span>
                    <span class="bg-gray my-3 h-px">1.500.000đ</span>
                </div>
                <div>
                    <span>
                        <form class="">
                            <div class="input-group mb-2 flex">
                                <label for="quantity-input" class="mb-2 block text-sm font-medium">Số lượng:</label>
                                <input type="number" name="quantity" id="quantity-input" />
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
