@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex items-center justify-between">
        <div class="flex justify-between flex-1 sm:hidden">
            @if ($paginator->onFirstPage())
                <div
                    class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-slate-400 bg-white dark:bg-[#2A3246] border border-slate-200 dark:border-slate-800 cursor-default leading-5 rounded-md">
                    {!! __('pagination.previous') !!}
                </div>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                   class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-slate-700 dark:text-white bg-white dark:bg-[#2A3246] border border-slate-200 dark:border-slate-800 leading-5 rounded-md hover:border-blue-500">
                    {!! __('pagination.previous') !!}
                </a>
            @endif

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                   class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-slate-700 dark:text-white bg-white dark:bg-[#2A3246] border border-slate-200 dark:border-slate-800 leading-5 rounded-md hover:border-blue-500">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <div
                    class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-slate-400 bg-white dark:bg-[#2A3246] border border-slate-200 dark:border-slate-800 cursor-default leading-5 rounded-md">
                    {!! __('pagination.next') !!}
                </div>
            @endif
        </div>

        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
            <div>
                <p class="text-sm text-slate-700 dark:text-slate-400 leading-5">
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span class="font-medium">{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span class="font-medium">{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('of') !!}
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div>
                <span class="relative z-0 inline-flex shadow-sm rounded-md">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <div role="button" aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span
                                class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-slate-700 bg-white dark:bg-[#2A3246] border border-slate-200 dark:border-slate-800 cursor-default rounded-l-md leading-5"
                                aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </span>
                        </div>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                           class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-slate-700 dark:text-slate-400 bg-white dark:bg-[#2A3246] rounded-l-md  border border-slate-200 hover:border-blue-500 dark:hover:border-blue-500 dark:border-slate-800 z-10 hover:z-20 leading-5"
                           aria-label="{{ __('pagination.previous') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <div role="button" aria-disabled="true">
                                <span
                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-slate-700 dark:text-slate-400 bg-white dark:bg-[#2A3246] border border-slate-200 dark:border-slate-800 cursor-default leading-5">{{ $element }}</span>
                            </div>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <div aria-current="page">
                                        <span
                                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium bg-blue-700 text-white border border-slate-200 dark:border-slate-800 cursor-default leading-5">{{ $page }}</span>
                                    </div>
                                @else
                                    <a href="{{ $url }}"
                                       class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-slate-700 dark:text-slate-400 bg-white dark:bg-[#2A3246] border border-slate-200 hover:border-blue-500 dark:hover:border-blue-500 dark:border-slate-800 z-10 hover:z-20 leading-5"
                                       aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                           class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-slate-700 dark:text-slate-400 bg-white dark:bg-[#2A3246] rounded-r-md border border-slate-200 hover:border-blue-500 dark:hover:border-blue-500 dark:border-slate-800 z-10 hover:z-20 leading-5"
                           aria-label="{{ __('pagination.next') }}">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                      d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </a>
                    @else
                        <div role="button" aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span
                                class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-slate-700 bg-white dark:bg-[#2A3246] border border-slate-200 dark:border-slate-800 cursor-default rounded-r-md leading-5"
                                aria-hidden="true">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </span>
                        </div>
                    @endif
                </span>
            </div>
        </div>
    </nav>
@endif
