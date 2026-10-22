<?php // app/Models/RecetaIngrediente.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecetaIngrediente extends Model
{
    protected $table = 'receta_ingredientes';

    protected $fillable = ['receta_id', 'ingrediente_id', 'cantidad', 'unidad_medida'];

    // RecetaIngrediente pertenece a 1 Receta
    public function receta(): BelongsTo
    {
        return $this->belongsTo(Receta::class, 'receta_id');
    }

    // RecetaIngrediente usa 1 Ingrediente
    public function ingrediente(): BelongsTo
    {
        return $this->belongsTo(Ingrediente::class, 'ingrediente_id');
    }
}