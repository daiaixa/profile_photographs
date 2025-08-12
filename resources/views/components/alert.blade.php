@props(['type'])

@php
    switch ($type) {
        case 'success':
            $estilo = 'text-green-800 bg-green-50 dark:bg-gray-800 dark:text-green-400';
            break;
        case 'danger':
            $estilo = 'text-red-800 bg-red-50 dark:bg-gray-800 dark:text-red-400';
            break;
        default:
            $estilo = 'text-blue-800 bg-blue-50 dark:bg-gray-800 dark:text-blue-400';
            break;
    }
@endphp

<div class="p-4 ms-4 text-sm rounded-lg {{$estilo}}" role="alert">
    <span class="font-medium"> {{$slot}} </span>
</div>
