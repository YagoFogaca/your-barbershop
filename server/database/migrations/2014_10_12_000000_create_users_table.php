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
            $table->ulid('id')->primary();
            $table->string('owner_name'); // nome do proprietário
            $table->string('email')->unique();
            $table->string('company_name')->unique(); // nome do salão/barbearia
            $table->string('password');
            $table->string('telephone');
            $table->string('cep');
            $table->string('state'); // estado,
            $table->string('city'); // cidade,
            $table->string('neighborhood'); // bairro,
            $table->string('address'); // endereço,
            $table->string('number'); // numero,
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
