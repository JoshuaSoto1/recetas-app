<?php // app/Models/Ingrediente.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ingrediente extends Model
{
    protected $table = 'ingredientes';

    protected $fillable = ['nombre'];

    // Ingrediente es usado en * RecetaIngrediente
    public function usos(): HasMany
    {
        return $this->hasMany(RecetaIngrediente::class, 'ingrediente_id');
    }
}
