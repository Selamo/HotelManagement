@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4">
    <h2 class="text-2xl font-bold mb-4">💰 Total Revenue</h2>
    <p class="text-xl mb-6">Total: ₦{{ number_format($totalRevenue, 2) }}</p>

    <div class="overflow-x-auto bg-white shadow rounded">
        <table class="min-w-full">
            <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="px-4 py-2">User</th>
                    <th class="px-4 py-2">Amount</th>
                    <th class="px-4 py-2">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $payment->user->name ?? 'N/A' }}</td>
                    <td class="px-4 py-2">₦{{ number_format($payment->amount, 2) }}</td>
                    <td class="px-4 py-2">{{ $payment->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $payments->links() }}
    </div>
</div>
@endsection
