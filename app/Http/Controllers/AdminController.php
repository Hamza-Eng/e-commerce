<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Admin $admin)
    {
// EN-COUR
// Les status des commendes :
// Livré
// Ramasser
// Anuller
// Reporté 
// Pas réponse
        $unconfirmedCommande=DB::table('commandes')
        ->where(["status"=>"EN-COUR"])
        ->get();
        $confirmedCommande=DB::table('commandes')
        ->where(["status"=>"confirmed"])
        ->get();
        $CommandeLivre=DB::table('commandes')
        ->where(["status"=>"CommandeLivre"])
        ->get();
        $confirmedCommande=DB::table('commandes')
        ->where(["status"=>"confirmed"])
        ->get();
        // return $Commande;
        return view("admin.index")->with(["unconfirmedCommande"=>$unconfirmedCommande,"confirmedCommande"=>$confirmedCommande]);
  
    }

    public function getCommandeByStatus($status){
        DB::table("commandes")->where(["status"=>$status])->get();

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
