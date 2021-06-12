<?php

namespace Database\Seeders;

use App\Models\TipoAdereso;
use Illuminate\Database\Seeder;

class AderesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adereso=new TipoAdereso();
        $adereso->nombre="Cebolla dulce";
        $adereso->precio=0.50;
        $adereso->save();
        $adereso=new TipoAdereso();
        $adereso->nombre="Aceite de oliva";
        $adereso->precio=0.70;
        $adereso->save();
        $adereso=new TipoAdereso();
        $adereso->nombre="Ranch";
        $adereso->precio=0.55;
        $adereso->save();
        $adereso=new TipoAdereso();
        $adereso->nombre="BBQ";
        $adereso->precio=0.25;
        $adereso->save();
        $adereso=new TipoAdereso();
        $adereso->nombre="Chipotle";
        $adereso->precio=0.10;
        $adereso->save();

    }
}
