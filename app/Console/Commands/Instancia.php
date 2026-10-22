<?php

namespace App\Console\Commands;

use App\Models\Ingrediente;
use App\Models\Receta;
use Illuminate\Console\Command;

class Instancia extends Command
{
    protected $signature = 'receta:instancia';

    protected $description = 'Instancia la clase Receta con sus ingredientes';

    public function handle(): void
    {
        
        $receta = Receta::firstOrCreate(
            ['titulo' => 'Panqueques'],
            [
                'porciones' => 4,
                'instrucciones' => 'Mezclar los ingredientes y cocinar en sartén caliente.',
            ]
        );

       
        $harina = Ingrediente::firstOrCreate(['nombre' => 'Harina']);
        $leche  = Ingrediente::firstOrCreate(['nombre' => 'Leche']);
        $huevo  = Ingrediente::firstOrCreate(['nombre' => 'Huevo']);

        
        $receta->detalles()->updateOrCreate(
            ['ingrediente_id' => $harina->id],
            ['cantidad' => 200, 'unidad_medida' => 'gramos']
        );
        $receta->detalles()->updateOrCreate(
            ['ingrediente_id' => $leche->id],
            ['cantidad' => 300, 'unidad_medida' => 'ml']
        );
        $receta->detalles()->updateOrCreate(
            ['ingrediente_id' => $huevo->id],
            ['cantidad' => 2, 'unidad_medida' => 'unidades']
        );

       
        $receta->load('detalles.ingrediente');

        $this->info("Receta: {$receta->titulo}");
        $this->line("Porciones: {$receta->porciones}");
        $this->line('Ingredientes:');

        foreach ($receta->detalles as $detalle) {
            $this->line("- {$detalle->cantidad} {$detalle->unidad_medida} de {$detalle->ingrediente->nombre}");
        }

        $this->line("Instrucciones: {$receta->instrucciones}");
    }
}