<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use Illuminate\Support\Facades\Cache;
use Kevinrob\GuzzleCache\CacheMiddleware;
use Kevinrob\GuzzleCache\Storage\LaravelCacheStorage;
use Kevinrob\GuzzleCache\Strategy\GreedyCacheStrategy;

class SteamApiService
{
    private const API_URL = "https://api.steampowered.com/";

    private const API_PLAYER_DATA_URL = "ISteamUser/GetPlayerSummaries/v2/";

    private string $apiKey;

    public function __construct()
    {
        $this->apiKey = config('steam.api.key');
    }

    public function getPlayerDataBySteamIds(string|array $steamIds): array
    {
        $response = $this->getApiResponse(
            $this->getPlayerDataUrl(
                is_array($steamIds) ? implode(",", $steamIds) : $steamIds
            )
        );

        return $response['response'] ?? [];
    }

    private function getPlayerDataUrl(string $steamIds): string
    {
        return self::API_PLAYER_DATA_URL . "?key=" . $this->apiKey . '&steamids=' . $steamIds;
    }

    private function getApiResponse(string $request): array
    {
        $stack = HandlerStack::create();

        $cache = new CacheMiddleware(
            new GreedyCacheStrategy(
                new LaravelCacheStorage(
                    Cache::store(config('steam.api.cache.store'))
                ),
                config('steam.api.cache.time')
            )
        );

        $stack->push($cache, 'cache');

        $client = new Client(['handler' => $stack]);

        try {
            $response = $client->get(self::API_URL . $request);
        } catch (GuzzleException $e) {
            report($e);

            return [];
        }

        $responseBody = $response->getBody();

        return json_decode($responseBody, true);
    }
}
