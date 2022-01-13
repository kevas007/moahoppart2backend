<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    public function paniers()
    {
        return $this->hasMany(ProductPanier::class, 'produits_id');
    }
    public function magasins()
    {
        return $this->belongsTo(Magasin::class, 'magasins_id');
    }
}
