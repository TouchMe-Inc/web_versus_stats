<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Services\StatsService;
use Illuminate\Contracts\View\View;

class StatsController extends Controller
{
    private StatsService $statsService;

    public function __construct()
    {
        $this->statsService = new StatsService();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('pages.stats.index', [
            'players' => $this->statsService->paginated(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Player $player): View
    {
        // SELECT (SELECT count(1) FROM vs_players b WHERE b.`rating`>a.`rating`)+1 as rank FROM vs_players a WHERE `id`=%d LIMIT 1;

        return view('pages.stats.show', [
            'player' => $this->statsService->addPlayerData($player),
        ]);
    }
}
