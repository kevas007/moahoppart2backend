<?php

namespace Database\Factories;

use App\Models\Panier;
use App\Models\Produit;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductPanierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $paniers = Panier::inRandomOrder()->first();
        $produits = Produit::inRandomOrder()->first();
        return [
            'paniers_id' => $paniers->id,
            'produits_id' => $produits->id,
            'quantity' => $this->faker->numberBetween(1,10),
            'commandes_id' => null,
        ];
    }
}
