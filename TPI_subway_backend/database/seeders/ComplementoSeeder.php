<?php

namespace Database\Seeders;

use App\Models\Complemento;
use Illuminate\Database\Seeder;

class ComplementoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $complemento=new Complemento();
        $complemento->nombre="Sopa de miso";
        $complemento->precio=1.25;
        $complemento->save();
        $complemento=new Complemento();
        $complemento->nombre="Galleta";
        $complemento->precio=1.55;
        $complemento->save();
        $complemento=new Complemento();
        $complemento->nombre="Gaseoa 600ml";
        $complemento->precio=1.10;
        $complemento->save();
        $complemento=new Complemento();
        $complemento->nombre="Postre";
        $complemento->precio=1.05;
        $complemento->save();
        $complemento=new Complemento();
        $complemento->nombre="Sorbete";
        $complemento->precio=1.00;
        $complemento->save();
    }
}
