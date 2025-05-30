<form action="{{ route('rooms.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Other input fields -->

    <div class="mb-4">
        <label class="block text-sm font-medium">Room Image</label>
        <input type="file" name="image" class="mt-1 p-2 border rounded w-full">
    </div>

    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Create Room</button>
</form>
