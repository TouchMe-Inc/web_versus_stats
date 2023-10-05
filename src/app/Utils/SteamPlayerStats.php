<?php

namespace App\Utils;

use App\Models\PlayerStats;
use App\Services\PlayerStatsService;
use App\Services\SteamApiService;

class SteamPlayerStats
{
    private SteamApiService $steamApiService;
    private PlayerStatsService $playerStatsService;

    private array $fields = [
        'communityvisibilitystate',
        'profilestate',
        'personaname',
        'profileurl',
        'avatarfull',
        'personastate'
    ];

    public function __construct()
    {
        $this->steamApiService = new SteamApiService();
        $this->playerStatsService = new PlayerStatsService();
    }

    public function paginated(): mixed
    {
        $players = $this->playerStatsService->paginated();

        $playersSteamId = [];
        foreach ($players as $player) {
            $playersSteamId[] = $player->steam_id;
        }

        $response = $this->steamApiService->getPlayerDataBySteamIds($playersSteamId);

        $data = [];

        if ($this->isValidPlayerDataResponse($response)) {
            foreach ($response['players'] as $player) {
                $data[$player['steamid']] = $player;
            }
        }

        foreach ($players as $player) {
            $this->bindPlayerData($player, $data[$player->steam_id] ?? []);
        }

        return $players;
    }

    public function addPlayerData(PlayerStats $player): PlayerStats
    {
        $response = $this->steamApiService->getPlayerDataBySteamIds($player->steam_id);

        return $this->bindPlayerData($player, $response['players'][0] ?? []);
    }

    public function bindPlayerData(PlayerStats $player, array $data): PlayerStats
    {
        foreach ($this->fields as $field) {
            $player->setAttribute($field, $data[$field] ?? null);
        }

        return $player;
    }

    private function isValidPlayerDataResponse(array $response): bool
    {
        return isset($response['players']);
    }
}
