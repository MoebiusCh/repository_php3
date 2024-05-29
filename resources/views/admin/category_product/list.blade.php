@extends('admin.layout')

@section('title', 'Danh sách danh mục')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="min-h-dvh p-4 sm:ml-64">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Name</th>
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
                                <a href="{{ route('admin.category.edit', $category->id) }}"
                                    class="bg-blue-500 text-white px-4 py-2 rounded">Edit</a>
                                <form action="{{ route('admin.products.destroy', $category->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded"
                                        onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
