@extends('admin.layout')
@section('title')

@section('content')
    <div class="min-h-dvh p-4 sm:ml-64">
        <!-- resources/views/user/edit.blade.php -->
        <div class="container mx-auto">
            <div class="bg-white p-6 rounded shadow-sm">
                <h2 class="text-2xl font-semibold mb-4">Edit User Information</h2>

                @if (session('success'))
                    <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-semibold">Name:</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}"
                            class="w-full border border-gray-300 p-2 rounded">
                        @error('name')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-semibold">Email:</label>
                        <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}"
                            class="w-full border border-gray-300 p-2 rounded">
                        @error('email')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-semibold">Password (Leave blank to keep
                            current password):</label>
                        <input type="password" name="password" id="password"
                            class="w-full border border-gray-300 p-2 rounded">
                        @error('password')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-gray-700 font-semibold">Confirm
                            Password:</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="w-full border border-gray-300 p-2 rounded">
                    </div>

                    <div class="mb-4">
                        <label for="role" class="block text-gray-700 font-semibold">Role:</label>
                        <input type="number" name="role" id="role" value="{{ old('role', $user->role) }}"
                            class="w-full border border-gray-300 p-2 rounded">
                        @error('role')
                            <div class="text-red-500 text-sm">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
