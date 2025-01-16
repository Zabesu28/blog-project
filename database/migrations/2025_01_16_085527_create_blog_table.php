<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id(); // Colonne 'id' auto-incrémentée
            $table->string('title'); // Titre du blog
            $table->text('content'); // Contenu
            $table->string('author'); // Auteur
            $table->string('image')->nullable(); // Colonne pour l'image (chemin ou URL), nullable
            $table->timestamps(); // Colonnes 'created_at' et 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
