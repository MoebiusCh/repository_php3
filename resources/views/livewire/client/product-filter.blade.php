<div class="flex">
    <div class="w-1/4">
        <div class="col-md-3 m-1">
            <label for="" class="text-lg font-bold mb-4">Search</label>
            <input type="text" placeholder="Nhập trên sản phẩm" class="input input-bordered w-full max-w-xs"
                wire:model.live.debounce.350ms='search' />
        </div>
        <div class="col-md-4 m-1">
            <label for="" class="text-lg font-bold mb-4">Sản phẩm mỗi trang</label>
            <select class="select select-bordered w-full max-w-xs" wire:model.live='perPage'>
                <option disabled selected>Chọn số lượng</option>
                <option value="6">6</option>
                <option value="12">12</option>
                <option value="24">24</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="" class="text-lg font-bold mb-4">Sắp xếp theo</label>
            <select class="select select-bordered w-full max-w-xs" wire:model.live='byColumn'>
                <option value="price">Giá</option>
                <option value="id">Ngày ra mắt</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="" class="text-lg font-bold mb-4">Sắp xếp</label>
            <select class="select select-bordered w-full max-w-xs" wire:model.live='orderBy'>
                <option value="asc">Tăng dần</option>
                <option value="desc">Giảm dần</option>
            </select>
        </div>
        <h2 class="text-lg font-bold mb-4 m-1">Categories</h2>
        @foreach ($categories as $category)
            <div class="mb-2">
                <input type="checkbox" wire:model.live="selectedCategories" value="{{ $category->id }}" class="mr-2">
                <label>{{ $category->name }}</label>
            </div>
        @endforeach
    </div>

    <div class="w-3/4 p-4">
        <h2 class="text-lg font-bold mb-4">Products</h2>
        <div class="grid grid-cols-3 gap-4">
            @foreach ($products as $item)
                <form class="card space-x-1 bg-base-100 shadow-xl">
                    <figure>
                        <a href="{{ route('product.list.show', ['list' => $item->id]) }}">
                            <img src="{{  asset('storage/' . $item->image) }}" alt="Shoes" class="cursor-pointer lg:max-h-40" />
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
        <div class="mt-4 w-[50%]">
            {{ $products->links('vendor.livewire.custom-pagination') }}
        </div>
    </div>

</div>
