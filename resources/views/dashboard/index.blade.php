@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4">
    <h1 class="text-3xl font-bold mb-6">🏨 Admin Dashboard</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <x-dashboard-card title="Total Rooms" value="{{ $roomCount }}" icon="hotel" link="{{ route('admin.rooms.index') }}" />
        <x-dashboard-card title="Available Rooms" value="{{ $availableRooms }}" icon="check-circle" link="{{ route('admin.rooms.available') }}" />
        <x-dashboard-card title="Booked Rooms" value="{{ $bookedRooms }}" icon="calendar-check" link="{{ route('admin.rooms.booked') }}" />
        <x-dashboard-card title="Total Bookings" value="{{ $bookingCount }}" icon="clipboard-list" link="{{ route('admin.bookings.index') }}" />
        <x-dashboard-card title="Payments Recorded" value="{{ $paymentCount }}" icon="credit-card" link="{{ route('admin.payments.index') }}" />
        <x-dashboard-card title="Total Revenue" value="₦{{ number_format($revenue, 2) }}" icon="dollar-sign" link="{{ route('admin.revenue.index') }}" />
        <x-dashboard-card title="Users Registered" value="{{ $users }}" icon="users" link="{{ route('admin.users.index') }}" />
    </div>
</div>
@endsection
