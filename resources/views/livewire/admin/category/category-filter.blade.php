<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <div class="min-h-dvh p-4 sm:ml-64">
        <div>
            <a href="{{ route('admin.products.create') }}"> <button class="btn btn-neutral">
                    Thêm danh mục
                </button>
            </a>
            <div class="flex col-md-3 m-1">
                <div>
                    <label for="" class="text-lg font-bold mb-4">Sắp xếp</label>
                    <select class="select select-bordered w-full max-w-xs" wire:model.live="orderBy">
                        <option value="asc">Tăng dần</option>
                        <option value="desc">Giảm dần</option>
                    </select>
                </div>
                <div>
                    <label for="" class="text-lg font-bold mb-4">Search</label>
                    <input type="text" placeholder="Nhập tên danh mục" class="input input-bordered w-full max-w-xs"
                        wire:model.live.debounce.350ms="search" />
                </div>
            </div>
        </div>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Created At</th>
                    <th class="py-2 px-4 border-b">Updated At</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $category->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $category->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $category->created_at }}</td>
                        <td class="py-2 px-4 border-b">{{ $category->updated_at }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('admin.categories.edit', ['category' => $category]) }}"
                                class="bg-blue-500 text-white px-4 py-2 rounded">Edit</a>
                            @if (count($category->products) > 0)
                                <form action="{{ route('admin.categories.confirm-delete', $category->id) }}"
                                    method="GET" class="inline-block">
                                    @csrf
                                    <button type="submit"
                                        class="bg-red-500 text-white px-4 py-2 rounded">Delete</button>
                                </form>
                            @else
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded"
                                        onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $categories->links() }}
    </div>
</div>
