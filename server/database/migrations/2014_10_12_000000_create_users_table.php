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
            $table->ulid('id');
            $table->string('owner_name'); // nome do proprietário
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('telephone')->unique();
            $table->string('company_name')->unique(); // nome do salão/barbearia
            $table->string('cep')->nullable();
            $table->string('state')->nullable(); // estado,
            $table->string('city')->nullable(); // cidade,
            $table->string('neighborhood')->nullable(); // bairro,
            $table->string('address')->nullable(); // endereço,
            $table->string('number')->nullable(); // numero,
            $table->string('complement')->nullable(); // complemento,
            $table->rememberToken();
            $table->timestamps();
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
