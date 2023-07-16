<?php

use App\Enums\VersusStats;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::connection('stats')->create('vs_players', function (Blueprint $table) {
            $table->id();
            $table->string('last_name', 65);
            $table->string('steam_id', 32);
            $table->unsignedInteger('played_time');
            $table->unsignedInteger('last_visit');
            $table->unsignedFloat('rating');

            for ($code = 0; $code < VersusStats::CODE_STATS_SIZE->value; $code++) {
                $table->unsignedInteger("code_{$code}")->default(0);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::connection('stats')->dropIfExists('vs_players');
    }
};
