@props([
    "active",
])

@php
    $classes =
        $active ?? false
            ? "inline-flex items-center rounded-full border-b-2 border-transparent px-2 py-4 text-lg leading-5 text-gray-800 transition duration-100 ease-out hover:bg-custom-yellow focus:bg-custom-yellow focus:outline-none"
            : "inline-flex items-center rounded-full border-b-2 border-transparent px-2 py-4 text-lg leading-5 text-gray-800 transition duration-100 ease-out hover:bg-custom-yellow focus:bg-custom-yellow focus:outline-none";
@endphp

<a {{ $attributes->merge(["class" => $classes]) }}>
    {{ $slot }}
</a>

<!--
? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
: 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
-->
