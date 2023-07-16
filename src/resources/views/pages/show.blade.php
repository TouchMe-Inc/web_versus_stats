@php
    use App\Enums\VersusStats;

    $stats = [
        VersusStats::S_K_SMOKER,
        VersusStats::S_K_BOOMER,
        VersusStats::S_K_HUNTER,
        VersusStats::S_K_SPITTER,
        VersusStats::S_K_CHARGER,
        VersusStats::S_K_JOCKEY,
        VersusStats::S_AVG_DMG_TANK,
        VersusStats::S_K_WITCH,
        VersusStats::S_K_WITCH_OS,
        VersusStats::S_K_CI
    ];
@endphp
<x-layout-default>
    <x-slot:title>
        {{$player['personaname'] ?? $player->last_name}}
    </x-slot:title>
    <section class="bg-white dark:bg-slate-900">
        <div class="mx-auto max-w-screen-xl py-8 sm:py-12 sm:px-6 px-4">
            <div class="flex">
                <div class="flex-none w-auto max-w-full pr-3">
                    <div
                        class="h-20 w-20"
                    >
                        <img class="w-full rounded-lg"
                             src="{{$player['avatarfull'] ?? asset('storage/noavatar.jpg')}}"
                             alt="{{$player['personaname'] ?? $player->last_name}}"
                             width="184" height="184"
                        />
                    </div>
                </div>
                <div class="flex-none w-auto max-w-full px-3 my-auto">
                    <div class="h-full">
                        <h5 class="mb-1 font-bold tracking-tight text-slate-900 dark:text-white">{{$player['personaname'] ?? $player->last_name}}</h5>
                        <p class="mb-0 font-semibold leading-normal text-sm text-slate-700 dark:text-slate-400">
                            {{ round($player->rating, 1) }}pts ∙ {{ round($player->played_time / 3600, 1) }}h
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-slate-100 dark:bg-slate-950 dark:bg-opacity-70">
        <div class="mx-auto max-w-screen-xl py-8 sm:py-12 sm:px-6 px-4">
            <div
                class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 sm:mb-6 mb-4"
            >
                @foreach($stats as $stat)
                    <div
                        class="flex flex-col bg-white dark:bg-slate-900 rounded-lg border border-slate-200 dark:border-slate-800">
                        <div class="flex flex-wrap p-4">
                            <div class="w-full max-w-full flex-grow flex-1">
                                <h5 class="text-slate-700 dark:text-slate-400 uppercase font-bold text-xs">
                                    {{__('stats.code_' . $stat->value)}}
                                </h5>
                                <span
                                    class="font-semibold text-xl text-slate-900 dark:text-white"
                                >
                                    {{$player['code_' . $stat->value]}}
                                </span>
                            </div>
                            <div class="w-auto pl-4 flex-initial">
                                <img
                                    src="{{asset('storage/stats/' . $stat->name . '.jpg')}}"
                                    class="inline-flex justify-center w-12 h-12 rounded-lg"
                                    alt=""
                                />
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="block p-6 bg-white dark:bg-slate-900 rounded-lg border border-slate-200 dark:border-slate-800 sm:mb-6 mb-4">
                <dl class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                    @for($code = VersusStats::S_K_SMG->value; $code <= VersusStats::S_K_GL->value; $code++)
                        <div class="flex flex-col justify-center">
                            <dd class="text-slate-700 dark:text-slate-400">{{__("stats.code_{$code}")}}</dd>
                            <dt class="mb-2 text-3xl font-extrabold text-slate-900 dark:text-white">{{$player["code_{$code}"]}}</dt>
                        </div>
                    @endfor
                </dl>
            </div>
            <div class="block p-6 bg-white dark:bg-slate-900 rounded-lg border border-slate-200 dark:border-slate-800">
                <dl class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5">
                    @for($code = VersusStats::S_K_KATANA->value; $code <= VersusStats::S_K_CROWBAR->value; $code++)
                        <div class="flex flex-col justify-center">
                            <dd class="text-slate-700 dark:text-slate-400">{{__("stats.code_{$code}")}}</dd>
                            <dt class="mb-2 text-3xl font-extrabold text-slate-900 dark:text-white">{{$player["code_{$code}"]}}</dt>
                        </div>
                    @endfor
                </dl>
            </div>
        </div>
    </section>
</x-layout-default>
