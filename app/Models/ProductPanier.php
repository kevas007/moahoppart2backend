<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPanier extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'paniers_id',
        'produits_id',
    ];
    public function panier()
    {
        return $this->belongsTo(Panier::class,'paniers_id','produits_id' );
    }
    public function produit()
    {
        return $this->belongsTo(Produit::class,'produits_id');
    }
}
