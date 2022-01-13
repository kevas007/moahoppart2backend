<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panier extends Model
{
    use HasFactory;
    protected $fillable = [
        'quantity',
        'users_id',
    ];
    public function product()
    {
        return $this->hasMany(ProductPanier::class, 'paniers_id');
    }
}
