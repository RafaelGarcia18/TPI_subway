<?php

namespace Database\Seeders;

use App\Models\TipoPan;
use Illuminate\Database\Seeder;

class PanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pan=new TipoPan();
        $pan->nombre="Blanco";
        $pan->precio=0.50;
        $pan->save();
        $pan=new TipoPan();
        $pan->nombre="Integral";
        $pan->precio=0.75;
        $pan->save();
        $pan=new TipoPan();
        $pan->nombre="Avena y miel";
        $pan->precio=0.46;
        $pan->save();
        $pan=new TipoPan();
        $pan->nombre="Oregano parmesano";
        $pan->precio=0.80;
        $pan->save();
        $pan=new TipoPan();
        $pan->nombre="Ajo rostizado";
        $pan->precio=0.75;
        $pan->save();
    }
}
