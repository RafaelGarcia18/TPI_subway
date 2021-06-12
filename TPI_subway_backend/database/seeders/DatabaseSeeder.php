<?php

namespace Database\Seeders;

use App\Models\Complemento;
use App\Models\Direccion;
use App\Models\Factura;
use App\Models\Orden;
use App\Models\Subway;
use App\Models\TipoAdereso;
use App\Models\TipoCarne;
use App\Models\TipoPan;
use App\Models\TipoQueso;
use App\Models\TipoVegetal;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //crea 50 usuarios
        $users = User::factory(50)->has(Direccion::factory()->count(3))->create();

        $this->call(PanSeeder::class);
        $this->call(CarneSeeder::class);
        $this->call(QuesoSeeder::class);
        $this->call(ComplementoSeeder::class);
        $this->call(AderesoSeeder::class);
        $this->call(VegetalSeeder::class);

        //se llena las tablas independientes tipopan,tipocarne,tipoqueso y complemento que son de uno a muchos
        $tipoPan = TipoPan::all();
        $tipoCarne = TipoCarne::all();
        $tipoQueso = TipoQueso::all();
        $complemento = Complemento::all();
        //se llenan las tablas independientes tipoadereso, tipovegetal que son de muchos a muchos
        $tipoAdereso = TipoAdereso::all();
        $tipoVegetal = TipoVegetal::all();

        //se recorren los usuarios para crear 10 subway para cada uno, se le pasan los arreglos a la funcion
        $users->each(function ($user) use ($tipoPan, $tipoCarne, $tipoQueso, $tipoAdereso, $tipoVegetal, $complemento) {
            //se crean 10 subways por cada usuario y se le añade su usuario. El tipopan, tipocarne y tipoqueso se añade aleatoreamente.
            // se usa el for ya que es relacion de uno a muchos inversa
            $subways = Subway::factory(10)->for($user)
            ->for($tipoPan->find(rand(1,5)))
            ->for($tipoCarne->find(rand(1,5)))
            ->for($tipoQueso->find(rand(1,5)))
            ->create();
            //se obtiene la primera direccion del usuario
            $direccion = Direccion::where('user_id', $user->id)->first();
            //se crea una factura por cada subway y se le añade la direccion, con esto se tendra una factura por usuario
            $factura = Factura::factory()->for($direccion)->create();
            //ahora se recorren los 10 subways creados para tener 10 ordenes de subway por factura
            $subways->each(function ($subway) use ($tipoAdereso, $tipoVegetal, $factura, $complemento) {
                //se le añade su arreglo de tipoadereso y tipovegetal ya que es relacion de muchos a muchos
                //se añade un numero random entre 1 y 5 aderesos y vegetales a cada subway
                $subway->tipoAdereso()->attach($tipoAdereso->take(rand(1,5)));
                $subway->tipoVegetal()->attach($tipoVegetal->take(rand(1,5)));

                //se crea una orden por cada subway y se le añade su factura, subway ya que es relacion de uno a muchos inversa
                //aqui se logra que por cada usuario haya una factura y que cada factura tenga una orden y que cada orden tenga
                //un subway y un complemento
                Orden::factory()->for($factura)->for($subway)->for($complemento->find(rand(1,5)))->create();
            });
        });
    }
}
