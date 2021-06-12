<?php

namespace Database\Seeders;

use App\Models\TipoVegetal;
use Illuminate\Database\Seeder;

class VegetalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vegetal=new TipoVegetal();
        $vegetal->nombre="Jitomate";
        $vegetal->precio=0.10;
        $vegetal->save();
        $vegetal=new TipoVegetal();
        $vegetal->nombre="Lechuga";
        $vegetal->precio=0.15;
        $vegetal->save();
        $vegetal=new TipoVegetal();
        $vegetal->nombre="Pepino";
        $vegetal->precio=0.20;
        $vegetal->save();
        $vegetal=new TipoVegetal();
        $vegetal->nombre="Cebolla";
        $vegetal->precio=0.10;
        $vegetal->save();
        $vegetal=new TipoVegetal();
        $vegetal->nombre="Jalapeño";
        $vegetal->precio=0.10;
        $vegetal->save();
    }
}
