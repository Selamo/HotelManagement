@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-10 px-4">
    <h2 class="text-2xl font-bold mb-6">✏️ Edit User</h2>

    <form action="{{ route('admin.users.update', $user) }}" method="POST" class="space-y-6 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label class="block mb-1 font-medium">Name</label>
            <input type="text" name="name" value="{{ old('name', $user->name) }}" required class="w-full border-gray-300 rounded px-3 py-2" />
        </div>

        <div>
            <label class="block mb-1 font-medium">Role</label>
            <select name="role" class="w-full border-gray-300 rounded px-3 py-2">
                <option value="admin" @selected($user->role === 'admin')>Admin</option>
                <option value="staff" @selected($user->role === 'staff')>Staff</option>
                <option value="customer" @selected($user->role === 'customer')>Customer</option>
            </select>
        </div>

        <div>
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Update</button>
            <a href="{{ route('admin.users.index') }}" class="ml-4 text-gray-600 hover:underline">Cancel</a>
        </div>
    </form>
</div>
@endsection
