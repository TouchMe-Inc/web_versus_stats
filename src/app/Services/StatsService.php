<?php

namespace App\Services;

use App\Models\Player;

class StatsService
{
    private SteamApiService $steamApiService;

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
    }

    public function paginated()
    {
        $players = Player::select(['id', 'rating', 'steam_id', 'last_name', 'played_time'])
            ->where('rating', '>', 0.0)
            ->orderBy('rating', 'desc')
            ->paginate(config('stats.pagination.perPage'));

        $playersSteamId = [];
        foreach ($players as $player) {
            $playersSteamId[] = $player->steam_id;
        }

        $response = $this->steamApiService->getPlayerDataBySteamIds($playersSteamId);

        $data = [];

        if (isset($response['players'])) {
            foreach ($response['players'] as $player) {
                $data[$player['steamid']] = $player;
            }
        }

        foreach ($players as $player) {
            $this->bindPlayerData($player, $data[$player->steam_id] ?? []);
        }

        return $players;
    }

    public function addPlayerData(Player $player): Player
    {
        $response = $this->steamApiService->getPlayerDataBySteamIds($player->steam_id);

        return $this->bindPlayerData($player, $response['players'][0] ?? []);
    }

    public function bindPlayerData(Player $player, array $data): Player
    {
        foreach ($this->fields as $field) {
            $player->setAttribute($field, $data[$field] ?? null);
        }

        return $player;
    }

    private function isValidPlayerDataResponse(array $response): bool
    {
        return isset($response['response']);
    }
}
