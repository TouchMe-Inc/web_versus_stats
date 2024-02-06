<?php

namespace App\Services;

use App\Models\PlayerStats;

class PlayerStatsService
{

    public function paginated()
    {
        return PlayerStats::select(['id', 'rating', 'steam_id', 'last_name', 'played_time'])
            ->where('rating', '>', 0.0)
            ->orderBy('rating', 'desc')
            ->paginate(config('stats.pagination.perPage'));
    }
}
