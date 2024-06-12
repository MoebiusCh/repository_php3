<div>
    <div class="carousel w-full">
        <div id="item1" class="carousel-item w-full">
            <img src="{{ asset('storage/img/banner/banner-1.jpg') }}" class="w-full" />
        </div>
        <div id="item2" class="carousel-item w-full">
            <img src="https://img.daisyui.com/images/stock/photo-1609621838510-5ad474b7d25d.jpg" class="w-full" />
        </div>
        <div id="item3" class="carousel-item w-full">
            <img src="https://img.daisyui.com/images/stock/photo-1414694762283-acccc27bca85.jpg" class="w-full" />
        </div>
        <div id="item4" class="carousel-item w-full">
            <img src="https://img.daisyui.com/images/stock/photo-1665553365602-b2fb8e5d1707.jpg" class="w-full" />
        </div>
    </div>
    <div class="flex w-full justify-center gap-2 py-2">
        <a href="#item1" class="btn btn-xs">1</a>
        <a href="#item2" class="btn btn-xs">2</a>
        <a href="#item3" class="btn btn-xs">3</a>
        <a href="#item4" class="btn btn-xs">4</a>
    </div>

    <main class="mx-52">
        <div class="mb-5 mt-section-space text-2xl font-bold">
            Sản phẩm
            <span class="badge badge-error uppercase">Hot</span>
        </div>
        <div class="products grid grid-cols-4 gap-2">
            @foreach ($products as $item)
                <form class="card space-x-1 bg-base-100 shadow-xl">
                    <figure>
                        <a href="{{ route('product.list.show', ['list' => $item->id]) }}">
                            <img src="{{ asset('storage/' . $item->image) }}" alt="Shoes" class="cursor-pointer lg:max-h-40" />
                        </a>
                    </figure>
                    <div class="card-body">
                        <h2 class="card-title">
                            {{ $item->title }}
                            <div class="badge badge-secondary">NEW</div>
                        </h2>
                        <p class="max-w-xs truncate">{{ $item->description }}...</p>
                        <div class="flex">
                            <div class="badge badge-outline">{{ $item->category->name }}</div>
                        </div>
                        <div class="card-actions place-items-center justify-between">
                            <div class="text-justify">
                                {{ $item->price }}
                                <sup>đ</sup>
                            </div>
                            <button class="btn btn-primary">Buy Now</button>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
        <div class="mb-5 mt-section-space text-2xl font-bold">
            Sản phẩm
            <span class="badge badge-warning uppercase">Mới</span>
        </div>
        <div class="grid grid-cols-4 gap-2">
            <form class="card space-x-1 bg-base-100 shadow-xl">
                <figure>
                    <a href="{{ route('product.list.show', ['list' => 1]) }}">
                        <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg"
                            alt="Shoes" class="cursor-pointer" />
                    </a>
                    <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="Shoes"
                        class="cursor-pointer" />
                    </a>
                </figure>
                <div class="card-body">
                    <h2 class="card-title">
                        Shoes!
                        <div class="badge badge-secondary">NEW</div>
                    </h2>
                    <p>If a dog chews shoes whose shoes does he choose?</p>
                    <div class="flex">
                        <div class="badge badge-outline">Fashion</div>
                        <div class="badge badge-outline">Products</div>
                    </div>
                    <div class="card-actions place-items-center justify-between">
                        <div class="text-justify">
                            100.000.000
                            <sup>đ</sup>
                        </div>
                        <button class="btn btn-primary">Buy Now</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>
