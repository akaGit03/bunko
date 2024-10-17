@props([
    "active",
])

@php
    $classes =
        $active ?? false
            ? "border-indigo-400 text-indigo-700 bg-indigo-50 focus:text-indigo-800 focus:bg-indigo-100 focus:border-indigo-700 block w-full border-l-4 py-2 pe-4 ps-3 text-start text-base font-medium transition duration-150 ease-in-out focus:outline-none"
            : "text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 block w-full border-l-4 border-transparent py-2 pe-4 ps-3 text-start text-base font-medium transition duration-150 ease-in-out focus:outline-none";
@endphp

<a {{ $attributes->merge(["class" => $classes]) }}>
    {{ $slot }}
</a>
