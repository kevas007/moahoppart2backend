<?php

namespace Database\Seeders;

use App\Models\Commande;
use App\Models\ProductPanier;
use App\Models\Produit;
use App\Models\Shop;
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

        User::factory(10)->create();
        $this->call(ProfilSeeder::class);
        $this->call(ShopSeeder::class);
        Produit::factory(50)->create();
        $this->call(PanierSeeder::class);
        Commande::factory(10)->create();
        ProductPanier::factory(10)->create();

    }
}
