<div class="min-h-dvh p-4 sm:ml-64">
    <h1 class="text-2xl font-bold mb-6">Thêm sản phẩm</h1>
    <form wire:submit="storeProduct">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="title">Title</label>
            <input wire:model='title' type="text" name="title" id="title" value="{{ old('title') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-4">
            {{-- <livewire:uploadfile wire:model='image'/> --}}
            <input type="file" wire:model="image" id='image' name="image">
            <div wire:loading wire:target="image" class="text-sm text-green-400 italic">Uploading...</div>
            @if ($image)
                <img class="w-[100px]" src="{{ $image->temporaryUrl() }}" alt="">
            @endif
            {{-- error message --}}
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="price">Price</label>
            <input wire:model='price' type="number" step="0.01" name="price" id="price"
                value="{{ old('price') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="sale">Sale</label>
            <input wire:model='sale' value="{{ old('sale') }}" type="number" step="0.01" name="sale"
                id="sale"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description</label>
            <textarea wire:model='description' value="{{ old('description') }}" name="description" id="description"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="detail">Detail</label>
            <textarea wire:model='detail'value="{{ old('detail') }}" name="detail" id="detail"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="status">Status</label>
            <input wire:model='status' type="number" name="status" id="status" value="{{ old('status') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="is_hot">Is Hot</label>
            <input wire:model='is_hot' type="number" name="is_hot" id="is_hot" value="{{ old('is_hot') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="sale_rate">Sale Rate</label>
            <input wire:model='sale_rate' type="number" name="sale_rate" id="sale_rate" value="{{ old('sale_rate') }}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="category_id">Category</label>
            <select wire:model='category_id' name="category_id" id="category_id"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option selected>Chọn Danh Mục</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex items-center justify-between w-52">
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Thêm
            </button>
            <a href="{{ route('admin.product') }}"
                class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                Huỷ
            </a>
        </div>
    </form>
</div>
