<?php

use Illuminate\Database\Seeder;

use App\Models\Base\Medida;
use App\Models\Base\Tipo_medida;
class BaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    

        $tipo_medida = new Tipo_medida;
        $tipo_medida->nombre = 'Cantidad';
        $tipo_medida->save();

        $medida = new Medida;
        $medida->nombre = 'Unidades';
        $medida->etiqueta = 'uni';
        $medida->tipo_medida()->associate($tipo_medida);
        $medida->save();

        $medida = new Medida;
        $medida->nombre = 'Docenas';
        $medida->etiqueta = 'doc';
        $medida->tipo_medida()->associate($tipo_medida);
        $medida->save();

        $tipo_medida = new Tipo_medida;
        $tipo_medida->nombre = 'Longitud';
        $tipo_medida->save();

        $medida = new Medida;
        $medida->nombre = 'Metro';
        $medida->etiqueta = 'm';
        $medida->tipo_medida()->associate($tipo_medida);
        $medida->save();

        $medida = new Medida;
        $medida->nombre = 'Milimetros';
        $medida->etiqueta = 'mm';
        $medida->tipo_medida()->associate($tipo_medida);
        $medida->save();

        $tipo_medida = new Tipo_medida;
        $tipo_medida->nombre = 'Area';
        $tipo_medida->save();

        $medida = new Medida;
        $medida->nombre = 'Metro Cuadrado';
        $medida->etiqueta = 'm²';
        $medida->tipo_medida()->associate($tipo_medida);
        $medida->save();

        $tipo_medida = new Tipo_medida;
        $tipo_medida->nombre = 'Peso';
        $tipo_medida->save();

        $medida = new Medida;
        $medida->nombre = 'Libras';
        $medida->etiqueta = 'lb';
        $medida->tipo_medida()->associate($tipo_medida);
        $medida->save();

        $medida = new Medida;
        $medida->nombre = 'Kilogramo';
        $medida->etiqueta = 'Kg';
        $medida->tipo_medida()->associate($tipo_medida);
        $medida->save();

        $medida = new Medida;
        $medida->nombre = 'Gramo';
        $medida->etiqueta = 'g';
        $medida->tipo_medida()->associate($tipo_medida);
        $medida->save();

        $tipo_medida = new Tipo_medida;
        $tipo_medida->nombre = 'Volumen';
        $tipo_medida->save();

        $medida = new Medida;
        $medida->nombre = 'Mililitros';
        $medida->etiqueta = 'ml';
        $medida->tipo_medida()->associate($tipo_medida);
        $medida->save();

        $medida = new Medida;
        $medida->nombre = 'Litros';
        $medida->etiqueta = 'l';
        $medida->tipo_medida()->associate($tipo_medida);
        $medida->save();

        $medida = new Medida;
        $medida->nombre = 'Centimetros Cubicos';
        $medida->etiqueta = 'cm³';
        $medida->tipo_medida()->associate($tipo_medida);
        $medida->save();
        
    }
}
