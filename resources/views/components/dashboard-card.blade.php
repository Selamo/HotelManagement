@props(['title', 'value', 'icon', 'link' => null])

@php
    $cardClasses = 'bg-white shadow rounded-xl p-5 hover:shadow-lg transition duration-300';
@endphp

@if($link)
<a href="{{ $link }}" class="block {{ $cardClasses }}">
@else
<div class="{{ $cardClasses }}">
@endif
    <div class="flex items-center space-x-4">
        <div class="text-indigo-600 text-3xl">
            <i class="fas fa-{{ $icon }}"></i>
        </div>
        <div>
            <div class="text-gray-500 text-sm">{{ $title }}</div>
            <div class="text-2xl font-bold text-gray-800">{{ $value }}</div>
        </div>
    </div>
@if($link)
</a>
@else
</div>
@endif
