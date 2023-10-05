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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            $table->foreignId('user_id')
            ->nullable()
            ->constrained()
            ->nullOnDelete();

            $table->foreignId('proyect_id')
            ->constrained()
            ->cascadeOnDelete();

            $table->string('description');

            $table->tinyInteger('sprint');

            $table->tinyInteger('hours');

            $table->enum(
                'status',
                [
                    'created',
                    'started',
                    'finished',
                    'canceled'
                ]
            )->default('created');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
