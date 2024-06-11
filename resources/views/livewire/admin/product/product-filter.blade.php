<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="min-h-dvh p-4 sm:ml-64">
        <div class="d-flex justify-content-between">
            <a href="{{ route('admin.products.create') }}">
                <button class="btn btn-neutral">Thêm sản phẩm</button>
            </a>
            <div class="col-md-3 m-1 d-flex">
                <div>
                    <label for="" class="text-lg font-bold mb-4">Sắp xếp</label>
                    <select class="select select-bordered w-full max-w-xs" wire:model="orderBy">
                        <option value="asc">Tăng dần</option>
                        <option value="desc">Giảm dần</option>
                    </select>
                </div>
                <div>
                    <label for="" class="text-lg font-bold mb-4">Search</label>
                    <input type="text" placeholder="Nhập tên sản phẩm" class="input input-bordered w-full max-w-xs"
                        wire:model.debounce.350ms="search" />
                </div>
            </div>
        </div>

        @isset($deleted_message)
            <span class="text-error"> {{ $deleted_message }}</span>
        @endisset
        @isset($success)
            <span class="text-success"> {{ $success }}</span>
        @endisset

        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Title</th>
                    <th class="py-2 px-4 border-b">Image</th>
                    <th class="py-2 px-4 border-b">Price</th>
                    <th class="py-2 px-4 border-b">Sale</th>
                    <th class="py-2 px-4 border-b">Status</th>
                    <th class="py-2 px-4 border-b">Is Hot</th>
                    <th class="py-2 px-4 border-b">Sale Rate</th>
                    <th class="py-2 px-4 border-b">Category</th>
                    <th class="py-2 px-4 border-b">Created At</th>
                    <th class="py-2 px-4 border-b">Updated At</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $product->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $product->title }}</td>
                        <td class="py-2 px-4 border-b">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}"
                                    class="w-16 h-16 object-cover">
                            @else
                                N/A
                            @endif
                        </td>
                        <td class="py-2 px-4 border-b">{{ $product->price }}</td>
                        <td class="py-2 px-4 border-b">{{ $product->sale > 0 ? 'Có' : 'Không' }}</td>
                        <td class="py-2 px-4 border-b">{{ $product->status ? 'Active' : 'Nonactive' }}</td>
                        <td class="py-2 px-4 border-b">{{ $product->is_hot ? 'Yes' : 'No' }}</td>
                        <td class="py-2 px-4 border-b">{{ $product->sale_rate }}</td>
                        <td class="py-2 px-4 border-b">{{ $product->category->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $product->created_at }}</td>
                        <td class="py-2 px-4 border-b">{{ $product->updated_at }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('admin.products.testupdate', ['product' => $product->id]) }}"
                                class="bg-blue-500 text-white px-4 py-2 rounded">Edit</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded"
                                    onclick="return confirm('Bạn có chắc muốn xoá sản phẩm này?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $products->links() }}
    </div>
</div>
