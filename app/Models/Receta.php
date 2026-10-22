<?php // app/Models/Receta.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Receta extends Model
{
    protected $table = 'recetas';

    protected $fillable = ['titulo', 'porciones', 'instrucciones'];

    // Receta contiene 1..* RecetaIngrediente
    public function detalles(): HasMany
    {
        return $this->hasMany(RecetaIngrediente::class, 'receta_id');
    }
}