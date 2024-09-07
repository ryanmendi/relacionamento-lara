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
        Schema::create('carros', function (Blueprint $table) {
            $table->id();
            $table->string('Marca');//Marca Carro
            $table->string('Modelo');//modelo carro
            $table->string('Ano');//ano carro
            $table->decimal('Preco', 8, 2);//preço carro
            $table->foreignId('Cor_id')->constraied('cores_cars');//cor carro (FK)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carros');
    }
};
