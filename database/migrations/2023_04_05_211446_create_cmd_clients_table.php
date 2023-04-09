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
        Schema::create('cmd_clients', function (Blueprint $table) {
            $table->id();
            $table->string('nom')->nullable(false);
            $table->string('prenom')->nullable(false);
            $table->date('date_de_naissance')->nullable(false);
            $table->string('adresse')->nullable(false);
            $table->string('numero', 20)->nullable(false);
            $table->string('email')->unique()->nullable(false);
            $table->string('produit')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cmd_clients');
    }
};
