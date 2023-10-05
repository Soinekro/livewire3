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
        Schema::create('roles', function (Blueprint $table) {
            $table->tinyIncrements('id')->unsigned();
            $table->string('name')->index();
            $table->string('slug')->unique()->index();
            $table->string('description');
            $table->timestamps();
        });

        Schema::create('proyect_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('proyect_id')->constrained()->cascadeOnDelete();
            $table->unsignedTinyInteger('role_id')
            ->index()
            ->default(1);
            $table->foreign('role_id')
            ->references('id')
            ->on('roles')
            ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyect_users');
        Schema::dropIfExists('roles');
    }
};
