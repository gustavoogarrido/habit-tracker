<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('habit_weekdays', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('task_id');
            $table->enum('weekday', [
                'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'
            ]);

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habit_weekdays');
    }
};
