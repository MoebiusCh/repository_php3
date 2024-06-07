@extends('admin.layout')

@section('title', 'Danh sách sản phẩm')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="min-h-dvh p-4 sm:ml-64">
            <a href="{{ route('admin.products.create') }}"> <button class="btn btn-neutral">
                    Thêm sản phẩm
                </button>
            </a>
            {{-- if exist message deleted --}}
            @isset($deleted_message)
                <span class="text-error"> {{ $deleted_message }}</span>
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
                                <a href="{{ route('admin.products.edit', $product->id) }}"
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
        </div>
    </div>
@endsection
