<?php

namespace Database\Seeders;

use App\Models\TipoCarne;
use Illuminate\Database\Seeder;

class CarneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carne=new TipoCarne();
        $carne->nombre="Pollo";
        $carne->precio=0.23;
        $carne->imagen='https://www.subway.com/ns/images/menu/DOR/SPA/menu-category-sandwich-ham.jpg';
        $carne->descripcion='Una tierna porción de pollo empanado sobre un pan recién horneado... ¿existe algo más tentador?';
        $carne->save();
        $carne=new TipoCarne();
        $carne->nombre="Res";
        $carne->precio=0.30;
        $carne->imagen='https://www.subway.com/ns/images/menu/DOR/SPA/RPLC_italian_bmt.jpg';
        $carne->descripcion='Rebanadas de filete de carne caliente, tierno y jugoso servidas en el pan que usted elija. Una explosión de sabor. ¡Tueste el pan para lograr un sabor aun más increíble!';
        $carne->save();
        $carne=new TipoCarne();
        $carne->nombre="Pavo";
        $carne->precio=0.35;
        $carne->imagen='https://www.subway.com/ns/images/menu/DOR/SPA/RPLC_oven_roasted_chicken.jpg';
        $carne->descripcion='Suculentas rebanadas de pechuga de pavo No se resista. ¡Puede comerlo libre de culpa!';
        $carne->save();
        $carne=new TipoCarne();
        $carne->nombre="Jamon";
        $carne->precio=0.55;
        $carne->imagen='https://www.subway.com/ns/images/menu/DOR/SPA/RPLC_steak_and_cheese.jpg';
        $carne->descripcion='Con un valor inigualable y una amplia gama de aderezos para elegir, nuestro sustancioso sándwich de jamón puede convertirse en un manjar nuevo y emocionante todos los días.';
        $carne->save();
        $carne=new TipoCarne();
        $carne->nombre="Tocino";
        $carne->precio=0.56;
        $carne->imagen='https://www.subway.com/ns/images/menu/ELS/SPA/RPLC_RoastBeef_B.jpg';
        $carne->descripcion='Relleno con finas rebanadas de roast beef, este favorito de multitudes se sirve en el pan recién horneado que usted elija.';
        $carne->save();
    }
}
