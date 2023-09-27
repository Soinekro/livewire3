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
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            $table->enum('document_type', ['dni', 'ruc'])
                ->default('dni')
                ->comment('tipo de documento del usuario');

            $table->char('document_number', 11)
                ->index()
                ->comment('codigo del usuario');

            $table->string('name')
                ->comment('nombre del usuario');

            $table->string('apellido_paterno')
                ->comment('apellido paterno del usuario');

            $table->string('apellido_materno')
                ->comment('apellido materno del usuario');

            $table->date('birthday')
                ->nullable()
                ->comment('fecha de nacimiento del usuario');

            $table->string('email')
                ->unique()
                ->nullable()
                ->comment('correo electronico del usuario');

            $table->string('phone', 9)
                ->nullable()
                ->default(null)
                ->comment('telefono del usuario');

            $table->string('contacto', 225)
                ->nullable()
                ->default(null)
                ->comment('contacto del usuario');

            $table->string('address')
                ->nullable()
                ->comment('direccion del usuario');

            $table->timestamp('email_verified_at')
                ->nullable();

            $table->string('password', 80)
                ->comment('contraseña del usuario');

            $table->smallInteger('points')
                ->default(0)
                ->comment('puntos del usuario');

            $table->rememberToken();

            $table->string('profile_photo_path', 2048)
                ->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
