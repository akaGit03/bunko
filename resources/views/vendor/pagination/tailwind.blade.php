@if ($paginator->hasPages())
    <nav
        role="navigation"
        aria-label="{{ __("Pagination Navigation") }}"
        class="flex justify-center items-center lg:justify-between">
        <!-- デフォルト使用：不要だが念のためコメントアウト
        <div class="flex flex-1 justify-between sm:hidden">
            @if ($paginator->onFirstPage())
                <span
                    class="relative inline-flex cursor-default items-center rounded-md border border-gray-200 bg-white px-4 py-2 leading-5 text-gray-500 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-600">
                    {!! __("pagination.previous") !!}
                </span>
            @else
                <a
                    href="{{ $paginator->previousPageUrl() }}"
                    class="relative inline-flex items-center rounded border border-gray-300 bg-white px-4 py-2 leading-5 text-gray-700 ring-gray-300 transition duration-150 ease-in-out hover:text-gray-500 focus:border-blue-300 focus:outline-none focus:ring active:bg-gray-100 active:text-gray-700 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                    {!! __("pagination.previous") !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a
                    href="{{ $paginator->nextPageUrl() }}"
                    class="relative ml-3 inline-flex items-center rounded border border-gray-200 bg-white px-4 py-2 leading-5 text-gray-700 ring-gray-300 transition duration-150 ease-in-out hover:text-gray-500 focus:border-blue-300 focus:outline-none focus:ring active:bg-gray-100 active:text-gray-700 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                    {!! __("pagination.next") !!}
                </a>
            @else
                <span
                    class="relative ml-3 inline-flex cursor-default items-center rounded border border-gray-200 bg-white px-4 py-2 leading-5 text-gray-500 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-600">
                    {!! __("pagination.next") !!}
                </span>
            @endif
        </div>
        -->

        <div
            class="flex items-center justify-between">
            <!-- デフォルト使用：不要だが念のためコメントアウト
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
                    class="relative z-0 inline-flex rounded shadow-sm rtl:flex-row-reverse px-4 lg:px-0">
                    {{-- Previous Page Link --}}

                    @if ($paginator->onFirstPage())
                        <span
                            aria-disabled="true"
                            aria-label="{{ __("pagination.previous") }}">
                            <span
                                class="relative inline-flex cursor-default items-center rounded-l-md border border-gray-300 bg-white px-2 py-2 leading-5 text-slate-600 dark:border-gray-600 dark:bg-gray-800"
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
                            class="relative inline-flex items-center rounded-l border border-gray-200 bg-white px-2 py-2 leading-5 text-slate-600 ring-gray-300 transition duration-150 ease-in-out hover:bg-custom-yellow focus:z-10 focus:border-pink-400 focus:outline-none active:bg-gray-100 active:text-gray-500 dark:border-gray-600 dark:bg-gray-800 dark:focus:border-blue-800 dark:active:bg-gray-700"
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
                                    class="relative -ml-px inline-flex cursor-default items-center border border-gray-200 bg-white px-2 py-2 leading-5 text-slate-600 dark:border-gray-600 dark:bg-gray-800">
                                    {{ $element }}
                                </span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @php
                                // Get current page
                                $currentPage = $paginator->currentPage();
                                // Calculate start and end page to display
                                $startPage = max(1, $currentPage - 1);
                                $endPage = min($paginator->lastPage(), $currentPage + 1);
                                // Adjust start and end for edges
                                if ($endPage - $startPage < 2) {
                                    $startPage = max(1, $endPage - 2);
                                    $endPage = min($paginator->lastPage(), $startPage + 2);
                                }
                            @endphp

                            {{-- Show "1" if it's not within the range --}}
                            @if ($startPage > 1)
                                <a href="{{ $paginator->url(1) }}"
                                class="relative -ml-px inline-flex items-center border border-gray-200 bg-white px-4 py-2 leading-5 text-slate-600 ring-gray-300 transition duration-150 ease-in-out hover:bg-custom-yellow focus:z-10 focus:border-pink-400 focus:outline-none active:bg-gray-100 active:text-gray-700 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300 dark:focus:border-blue-800 dark:active:bg-gray-700">
                                    1
                                </a>
                                @if ($startPage > 2)
                                    <span aria-disabled="true" class="px-3">...</span>
                                @endif
                            @endif

                            {{-- Loop through visible pages --}}
                            @for ($page = $startPage; $page <= $endPage; $page++)
                                @if ($page == $currentPage)
                                    <span aria-current="page" class="relative -ml-px inline-flex cursor-default items-center border border-gray-200 bg-pink-400 px-4 py-2 leading-5 text-white dark:border-gray-600 dark:bg-gray-800">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $paginator->url($page) }}"
                                    class="relative -ml-px inline-flex items-center border border-gray-200 bg-white px-4 py-2 leading-5 text-slate-600 ring-gray-300 transition duration-150 ease-in-out hover:bg-custom-yellow focus:z-10 focus:border-pink-400 focus:outline-none active:bg-gray-100 active:text-gray-700 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300 dark:focus:border-blue-800 dark:active:bg-gray-700">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endfor

                            {{-- Show last page if it's not within the range --}}
                            @if ($endPage < $paginator->lastPage())
                                @if ($endPage < $paginator->lastPage() - 1)
                                    <span aria-disabled="true" class="px-3">...</span>
                                @endif
                                <a href="{{ $paginator->url($paginator->lastPage()) }}"
                                class="relative -ml-px inline-flex items-center border border-gray-200 bg-white px-4 py-2 leading-5 text-slate-600 ring-gray-300 transition duration-150 ease-in-out hover:bg-custom-yellow focus:z-10 focus:border-pink-400 focus:outline-none active:bg-gray-100 active:text-gray-700 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:text-gray-300 dark:focus:border-blue-800 dark:active:bg-gray-700">
                                    {{ $paginator->lastPage() }}
                                </a>
                            @endif
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}

                    @if ($paginator->hasMorePages())
                        <a
                            href="{{ $paginator->nextPageUrl() }}"
                            rel="next"
                            class="relative -ml-px inline-flex items-center rounded-r border border-gray-200 bg-white px-2 py-2 leading-5 text-slate-600 ring-gray-300 transition duration-150 ease-in-out hover:bg-custom-yellow focus:z-10 focus:border-pink-400 focus:outline-none active:bg-gray-100 active:text-gray-500 dark:border-gray-600 dark:bg-gray-800 dark:focus:border-blue-800 dark:active:bg-gray-700"
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
                                class="relative -ml-px inline-flex cursor-default items-center rounded-r border border-gray-200 bg-white px-2 py-2 leading-5 text-slate-600 dark:border-gray-600 dark:bg-gray-800"
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
