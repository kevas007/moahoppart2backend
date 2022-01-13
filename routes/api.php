<?php

use App\Http\Controllers\ShopController;
use App\Models\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/tokens/create', function (Request $request) {
    $token = $request->user()->createToken($request->token_name);

    return [
        'token' => $token->plainTextToken,
        'connection'=>Auth::user()
];
});

Route::get('/freeMagasin', function () {

    $datas= DB::table('shops')
    ->join('produits', 'shops.id', '=', 'produits.shops_id')
    ->join('users', 'shops.user_id', '=', 'users.id')
    ->where ('shops.user_id', '=', '1')
    ->select('shops.name as magasin_name', 'produits.name as produit_name', 'users.firstname as user_firstname', 'users.lastname as user_lastname', 'produits.description as produit_description', 'produits.price as produit_price', 'produits.cover_path as produit_cover_path', 'produits.quantity as produit_quantity')
    ->get();
        return response()->json(
            [
                'message' => 'Liste des produits',
                'data' => $datas
            ],
            200,
            [
                'Content-Type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );

    });


Route::get('/magasin', [ShopController::class, 'index'])->middleware(['auth']);

Route::get('/magasin/{id}', [ShopC::class, 'show'])->middleware(['auth']);

Route::post('/panier/{id}', [PanierController::class, 'store'])->middleware(['auth']);

Route::get('/panier', [PanierController::class, 'index'])->middleware(['auth']);

Route::delete('/panier/{id}', [PanierController::class, 'destroy'])->middleware(['auth']);

Route::post('/commande/', [CommandeController::class, 'store'])->middleware(['auth']);


Route::get('/commande', [CommandeController::class, 'index'])->middleware(['auth']);


Route::get('/commande/{id}', [CommandeController::class, 'show'])->middleware(['auth']);



Route::get('/user/{id}', [ProfilController::class, 'edit'])->middleware(['auth']);

Route::put('/user/{id}', [ProfilController::class, 'update'])->middleware(['auth']);

Route::delete('/shop/{id}', [ProduitController::class, 'destroy'])->middleware(['auth']);

Route::get('/shop', [ProduitController::class, 'create'])->middleware(['auth']);

Route::post('/shop', [ProduitController::class, 'store'])->middleware(['auth']);

Route::get('/shop/{id}/edit', [ProduitController::class, 'edit'])->middleware(['auth']);

Route::put('/shop/{id}', [ProduitController::class, 'update'])->middleware(['auth']);
