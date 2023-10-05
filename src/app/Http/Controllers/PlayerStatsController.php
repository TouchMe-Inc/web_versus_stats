<?php

namespace App\Http\Controllers;

use App\Models\PlayerStats;
use App\Utils\SteamPlayerStats;
use Illuminate\Contracts\View\View;

class PlayerStatsController extends Controller
{
    private SteamPlayerStats $steamPlayerStats;

    public function __construct()
    {
        $this->steamPlayerStats = new SteamPlayerStats();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('pages.stats.index', [
            'players' => $this->steamPlayerStats->paginated(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(PlayerStats $player): View
    {
        return view('pages.stats.show', [
            'player' => $this->steamPlayerStats->addPlayerData($player),
        ]);
    }
}
