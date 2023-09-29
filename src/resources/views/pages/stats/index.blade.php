<x-layout-default>
    <x-slot:title>
        Stats
    </x-slot:title>
    <section class="bg-slate-100 dark:bg-[#1e2433] py-[65px] md:py-[105px] px-4 2xl:px-0">
        <div class="mx-auto max-w-screen-xl">
            <div class="w-full lg:w-1/2 m-auto text-center">
                <h2 class="text-[56px] tracking-tight font-bold text-slate-900 dark:text-white">Top players</h2>
            </div>
            @if($players->count() > 0)
                <div
                    class="grid grid-cols-2 gap-4 sm:gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 mt-[37px] md:mt-[55px]"
                >
                    @foreach($players as $pos => $player)
                        <a href="{{route('stats.show', ['player' => $player])}}">
                            <div
                                class="w-full inline-flex flex-col bg-white dark:bg-[#2A3246] rounded-lg border border-slate-200 hover:border-blue-500 dark:border-transparent">
                                <div class="relative inline-flex flex-col items-center rounded-lg p-[10px]">
                                    <img class="w-full rounded-lg hover:scale-95 transition duration-500 ease-in-out"
                                         src="{{$player['avatarfull'] ?? asset('storage/noavatar.jpg')}}"
                                         alt="{{$player['personaname'] ?? $player->last_name}}"
                                         width="184" height="184"
                                    />
                                    <div
                                        class="absolute inline-flex items-center -bottom-2 rounded-lg bg-white dark:bg-[#2A3246] p-[10px_15px] text-slate-700 dark:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                             viewBox="0 0 20 20"
                                             fill="currentColor">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                        </svg>
                                        <label class="ml-1 text-sm">{{$players->firstItem() + $pos}}</label>
                                    </div>
                                </div>
                                <div class="text-center p-[15px_10px_30px_10px]">
                                    <div class="text-slate-900 dark:text-white line-clamp-1">
                                        {{$player['personaname'] ?? $player->last_name}}
                                    </div>
                                    <div class="font-normal text-slate-700 dark:text-slate-400">
                                        {{ round($player->rating, 1) }}pts ∙ {{ round($player->played_time / 3600, 1) }}
                                        h
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <div class="sm:pt-6 pt-4">
                    {!! $players->links() !!}
                </div>
            @else
                <div
                    class="sm:p-6 p-4 text-sm rounded-lg text-red-900 bg-red-200 dark:bg-red-900 dark:text-red-200 mt-[37px] md:mt-[55px]"
                    role="alert"
                >
                    Players Not Found.
                </div>
            @endif
        </div>
    </section>
</x-layout-default>
