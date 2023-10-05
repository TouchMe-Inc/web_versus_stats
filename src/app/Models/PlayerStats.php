<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $steam_id
 * @property string $last_name
 * @property float $rating
 * @property int $played_time
 * @property int $last_visit
 */
class PlayerStats extends Model
{
    use HasFactory;

    protected $table = 'vs_players';

    protected $connection = 'stats';

    public $timestamps = false;

    /**
     * Get the route key name for Laravel.
     *
     * @return string
     */
    public function getRouteKeyName(): string
    {
        return 'id';
    }
}
