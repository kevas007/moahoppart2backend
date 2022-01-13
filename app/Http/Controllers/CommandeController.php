<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Http\Requests\StoreCommandeRequest;
use App\Http\Requests\UpdateCommandeRequest;
use App\Models\ProductPanier;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commandes = Commande::where('user_id', Auth::user()->id)->get();
        // dd($commandes);
        return response()->json(
            [
                'message' => 'Commandes récupérées avec succès',
                $commandes
            ],
            200,
            [
                'Content-Type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommandeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommandeRequest $request)
    {
        $panier = Auth::user()->panier;
        $paniers = ProductPanier::where('paniers_id', $panier->id)->get();
        $commande = new Commande();
        $commande->user_id = Auth::user()->id;
        $commande->date = Carbon::now();
        $commande->save();
        foreach ($paniers as $item) {
            $item->commandes_id = $commande->id;
            $item->paniers_id = null;
            $item->save();
        }
        return response()->json(
                [
                    'success' => true,
                    'message' => 'Commande enregistrée avec succès',
                    'data' => $commande
                ],
            200,
            ['Content-Type' => 'application/json;charset=UTF-8',
            'Charset' => 'utf-8'],
            JSON_UNESCAPED_UNICODE
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paniers = Commande::find($id);
        $paniers = ProductPanier::where('commandes_id', $paniers->id)->get();
        // dd($paniers);
        return response()->json(
            [
                'success' => true,
                'message' => 'Commande récupérée avec succès',
                $paniers
            ],
            200,
            [
                'Content-Type' => 'application/json;charset=UTF-8',
                'Charset' => 'utf-8'
            ],
            JSON_UNESCAPED_UNICODE
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommandeRequest  $request
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommandeRequest $request, Commande $commande)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {
        //
    }
}
