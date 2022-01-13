<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPaniersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_paniers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paniers_id')->nullable()->constrained();
            $table->foreignId('produits_id')->constrained();
            $table->foreignId('commandes_id')->nullable()->constrained();
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_paniers');
    }
}
