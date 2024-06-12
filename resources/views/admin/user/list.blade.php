@extends('admin.layout')

@section('title', 'Danh sách người dùng')

@section('content')
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="min-h-dvh p-4 sm:ml-64">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Name</th>
                        <th class="py-2 px-4 border-b">Email</th>
                        <th class="py-2 px-4 border-b">Email Verified At</th>
                        <th class="py-2 px-4 border-b">Role</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                            <td class="py-2 px-4 border-b">{{ $user->email_verified_at ?? 'Not Verified' }}</td>
                            <td class="py-2 px-4 border-b">{{ $user->role == 0 ? 'Admin' : 'Người dùng' }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('admin.users.edit', $user->id) }}"
                                    class="bg-blue-500 text-white px-4 py-2 rounded">Edit</a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded"
                                        onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
