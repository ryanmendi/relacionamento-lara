<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cores_car extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
    ];

    protected $table = 'cor_cars';

    /**
     * Get the user that owns the cores_car
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function carros()
    {
        return $this->belongsTo(carros::class); // define o relacionamento (1 - n) uma cor pode ser assosiada para varios carros
    }
}
