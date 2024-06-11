@extends('admin.layout')

@section('title', 'Xác nhận xoá danh mục')

@section('content')
    <div class="container mx-auto p-4 min-h-dvh">
        <div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold mb-4">Confirm Delete Category</h2>

            <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="mb-4">
                    <p class="text-gray-700">This category has associated products. Please choose an action:</p>
                    <div class="mt-2">
                        <label>
                            <input type="radio" name="action" value="delete" required> Delete all associated products
                        </label>
                    </div>
                    <div class="mt-2">
                        <label>
                            <input type="radio" name="action" value="move" required> Move all associated products to
                            default category
                        </label>
                    </div>
                    <div class="mt-2" id="defaultCategorySection" style="display: none;">
                        <label for="default_category_id" class="block text-gray-700">Default Category</label>
                        <select name="default_category_id" id="default_category_id"
                            class="w-full p-2 border border-gray-300 rounded">
                            @foreach ($defaultCategories as $defaultCategory)
                                <option value="{{ $defaultCategory->id }}">{{ $defaultCategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">Confirm</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const actionInputs = document.querySelectorAll('input[name="action"]');
            const defaultCategorySection = document.getElementById('defaultCategorySection');

            actionInputs.forEach(input => {
                input.addEventListener('change', function() {
                    if (this.value === 'move') {
                        defaultCategorySection.style.display = 'block';
                    } else {
                        defaultCategorySection.style.display = 'none';
                    }
                });
            });
        });
    </script>
@endsection
