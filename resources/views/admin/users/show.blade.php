@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-10 px-4">
    <h2 class="text-2xl font-bold mb-6">👤 User Details</h2>

    <div class="bg-white rounded shadow p-6 space-y-4">
        <div>
            <strong>Name:</strong> {{ $user->name }}
        </div>

        <div>
            <strong>Email:</strong> {{ $user->email }}
        </div>

        <div>
            <strong>Role:</strong> {{ ucfirst($user->role) }}
        </div>

        <div class="pt-4">
            <a href="{{ route('admin.users.edit', $user) }}" class="text-indigo-600 hover:underline">Edit</a> |
            <a href="{{ route('admin.users.index') }}" class="text-gray-600 hover:underline">Back to List</a>
        </div>
    </div>
</div>
@endsection
