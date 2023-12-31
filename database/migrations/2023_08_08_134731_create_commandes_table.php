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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->integer("product_id");
            $table->string("name");
            $table->string("adresse");
            $table->string("telephone");
            $table->string("city");
            $table->string("data");
            $table->integer("qte")->default(1);
// Les status des commendes :
// EN-COUR
// Livré
// Ramasser
// Anuller
// Reporté 
// Pas réponse
            $table->string("status")->default("EN-COUR");           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
