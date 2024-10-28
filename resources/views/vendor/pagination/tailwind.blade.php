@if ($paginator->hasPages())
    <nav
        role="navigation"
        aria-label="{{ __("Pagination Navigation") }}"
        class="flex items-center justify-between">
        <div class="flex flex-1 justify-between sm:hidden">
            @if ($paginator->onFirstPage())
                <span
                    class="text-gray-500 bg-white border-gray-200 dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600 relative inline-flex cursor-default items-center rounded-md border px-4 py-2 leading-5">
                    {!! __("pagination.previous") !!}
                </span>
            @else
                <a
                    href="{{ $paginator->previousPageUrl() }}"
                    class="text-gray-700 bg-white border-gray-300 hover:text-gray-500 ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300 relative inline-flex items-center rounded border px-4 py-2 leading-5 transition duration-150 ease-in-out focus:outline-none focus:ring">
                    {!! __("pagination.previous") !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a
                    href="{{ $paginator->nextPageUrl() }}"
                    class="text-gray-700 bg-white border-gray-200 hover:text-gray-500 ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300 relative ml-3 inline-flex items-center rounded border px-4 py-2 leading-5 transition duration-150 ease-in-out focus:outline-none focus:ring">
                    {!! __("pagination.next") !!}
                </a>
            @else
                <span
                    class="text-gray-500 bg-white border-gray-200 dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600 relative ml-3 inline-flex cursor-default items-center rounded border px-4 py-2 leading-5">
                    {!! __("pagination.next") !!}
                </span>
            @endif
        </div>

        <div
            class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
            <!--
            <div>
                <p class="text-gray-700 leading-5 dark:text-gray-400">
                    {!! __("Showing") !!}
                    @if ($paginator->firstItem())




                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __("to") !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
@else




                        {{ $paginator->count() }}
@endif
                    {!! __("of") !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __("results") !!}
                </p>
            </div>
            -->

            <div>
                <span
                    class="relative z-0 inline-flex rounded shadow-sm rtl:flex-row-reverse">
                    {{-- Previous Page Link --}}

                    @if ($paginator->onFirstPage())
                        <span
                            aria-disabled="true"
                            aria-label="{{ __("pagination.previous") }}">
                            <span
                                class="text-slate-600 bg-white border-gray-300 dark:bg-gray-800 dark:border-gray-600 relative inline-flex cursor-default items-center rounded-l-md border px-2 py-2 leading-5"
                                aria-hidden="true">
                                <svg
                                    class="h-5 w-5"
                                    fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        fill-rule="evenodd"
                                        d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @else
                        <a
                            href="{{ $paginator->previousPageUrl() }}"
                            rel="prev"
                            class="text-slate-600 bg-white border-gray-200 hover:bg-custom-yellow ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 dark:bg-gray-800 dark:border-gray-600 dark:active:bg-gray-700 dark:focus:border-blue-800 relative inline-flex items-center rounded-l border px-2 py-2 leading-5 transition duration-150 ease-in-out focus:z-10 focus:outline-none focus:ring"
                            aria-label="{{ __("pagination.previous") }}">
                            <svg
                                class="h-5 w-5"
                                fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    fill-rule="evenodd"
                                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span
                                    class="text-slate-600 bg-white border-gray-200 dark:bg-gray-800 dark:border-gray-600 relative -ml-px inline-flex cursor-default items-center border px-2 py-2 leading-5">
                                    {{ $element }}
                                </span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span aria-current="page">
                                        <span
                                            class="text-white bg-pink-400 border-gray-200 dark:bg-gray-800 dark:border-gray-600 relative -ml-px inline-flex cursor-default items-center border px-4 py-2 leading-5">
                                            {{ $page }}
                                        </span>
                                    </span>
                                @else
                                    <a
                                        href="{{ $url }}"
                                        class="text-slate-600 bg-white border-gray-200 hover:bg-custom-yellow ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400 dark:hover:text-gray-300 dark:active:bg-gray-700 dark:focus:border-blue-800 relative -ml-px inline-flex items-center border px-4 py-2 leading-5 transition duration-150 ease-in-out focus:z-10 focus:outline-none focus:ring"
                                        aria-label="{{ __("Go to page :page", ["page" => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}

                    @if ($paginator->hasMorePages())
                        <a
                            href="{{ $paginator->nextPageUrl() }}"
                            rel="next"
                            class="text-slate-600 bg-white border-gray-200 hover:bg-custom-yellow ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 dark:bg-gray-800 dark:border-gray-600 dark:active:bg-gray-700 dark:focus:border-blue-800 relative -ml-px inline-flex items-center rounded-r border px-2 py-2 leading-5 transition duration-150 ease-in-out focus:z-10 focus:outline-none focus:ring"
                            aria-label="{{ __("pagination.next") }}">
                            <svg
                                class="h-5 w-5"
                                fill="currentColor"
                                viewBox="0 0 20 20">
                                <path
                                    fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </a>
                    @else
                        <span
                            aria-disabled="true"
                            aria-label="{{ __("pagination.next") }}">
                            <span
                                class="text-slate-600 bg-white border-gray-200 dark:bg-gray-800 dark:border-gray-600 relative -ml-px inline-flex cursor-default items-center rounded-r border px-2 py-2 leading-5"
                                aria-hidden="true">
                                <svg
                                    class="h-5 w-5"
                                    fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path
                                        fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                        </span>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
