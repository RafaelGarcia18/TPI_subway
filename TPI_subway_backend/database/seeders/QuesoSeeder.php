<?php

namespace Database\Seeders;

use App\Models\TipoQueso;
use Illuminate\Database\Seeder;

class QuesoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $queso=new TipoQueso();
        $queso->nombre="Cheddar";
        $queso->precio=0.56;
        $queso->save();
        $queso=new TipoQueso();
        $queso->nombre="Manchego";
        $queso->precio=0.25;
        $queso->save();
        $queso=new TipoQueso();
        $queso->nombre="Americano";
        $queso->precio=0.35;
        $queso->save();
        $queso=new TipoQueso();
        $queso->nombre="Monterrey";
        $queso->precio=0.75;
        $queso->save();
        $queso=new TipoQueso();
        $queso->nombre="Craft";
        $queso->precio=0.12;
        $queso->save();
    }
}
