<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carros extends Model
{
    use HasFactory;

    protected $fillable = [
        'Marca',
        'Modelo',
        'Ano',
        'Preco',
        'cor_id',
    ];

    // relacionamento com a cor
/**
         * Get the user that owns the carros
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function user(): BelongsTo
        {
            return $this->belongsTo(cor::class);//cor(): Define um relacionamento do tipo belongsTo entre a model Carro e a model Cor, indicando que cada carro pertence a uma cor específica.
        }
}
