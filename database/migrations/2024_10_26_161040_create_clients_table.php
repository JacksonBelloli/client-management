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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            /* Personal info */
            $table->string('name');
            $table->string('cpf_cnpj')->unique();
            $table->string('email');
            $table->string('phone');

            /* Address info */
            $table->string('zip_code');
            $table->string('street');
            $table->integer('number');
            $table->string('complement')->nullable();
            $table->string('city');
            $table->string('district');
            $table->string('state');
            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
