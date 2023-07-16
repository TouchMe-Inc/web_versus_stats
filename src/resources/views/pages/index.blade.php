<x-layout-default>
    <section class="bg-white dark:bg-slate-900">
        <div class="mx-auto max-w-screen-xl py-8 sm:py-12 sm:px-6 px-4">
            <h1 class="text-xl tracking-tight font-bold text-slate-900 dark:text-white uppercase">
                Top players:
            </h1>
        </div>
    </section>
    <section class="bg-slate-100 dark:bg-slate-950 dark:bg-opacity-70">
        <div class="mx-auto max-w-screen-xl py-8 sm:py-12 sm:px-6 px-4">
            @if($players->count() > 0)
                <div
                    class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5"
                >
                    @foreach($players as $pos => $player)
                        <a
                            href="{{route('stats.show', ['player' => $player])}}"
                            class="block p-6 bg-white dark:bg-slate-900 rounded-lg border border-slate-200 dark:border-slate-800 hover:border-blue-500 dark:hover:border-blue-500"
                        >
                            <div class="relative flex items-end overflow-hidden rounded-lg">
                                <img class="w-full"
                                     src="{{$player['avatarfull'] ?? asset('storage/noavatar.jpg')}}"
                                     alt="{{$player['personaname'] ?? $player->last_name}}"
                                     width="184" height="184"
                                />
                                <div
                                    class="absolute top-3 left-3 inline-flex items-center rounded-lg bg-white dark:bg-slate-900 p-2 text-slate-700 dark:text-slate-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-500"
                                         viewBox="0 0 20 20"
                                         fill="currentColor">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                    </svg>
                                    <span class="ml-1 text-sm">{{$players->firstItem() + $pos}}</span>
                                </div>
                            </div>
                            <div class="mt-1 pt-2">
                                <h2 class="font-semibold text-slate-900 dark:text-white line-clamp-1">
                                    {{$player['personaname'] ?? $player->last_name}}
                                </h2>
                                <p class="font-normal text-slate-700 dark:text-slate-400">
                                    {{ round($player->rating, 1) }}pts ∙ {{ round($player->played_time / 3600, 1) }}h
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="sm:pt-6 pt-4">
                    {!! $players->links() !!}
                </div>
            @else
                <div
                    class="sm:p-6 p-4 text-sm rounded-lg text-red-900 bg-red-200 dark:bg-red-900 dark:text-red-200"
                    role="alert"
                >
                    Players Not Found.
                </div>
            @endif
        </div>
    </section>
</x-layout-default>
