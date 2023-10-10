<?php

namespace App\Http\Controllers;

use App\Models\commande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommandeController extends Controller
{

    public function confirme($id)
    {
        DB::table("commandes")
        ->where(["id"=>$id])
        ->update(["status"=>"confirmed"]);
        return redirect()->route("admin_home");
    }
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


     public function updateStatus($id,$status){
            DB::table("commandes")->where(["id"=>$id])->update(["status"=>$status]);
     }
    public function create(Request $request)
    {
      
        $commande=new commande();
        $commande->name=$request->get("name");
        $commande->telephone=$request->get("telephone");
        $commande->city=$request->get("city");
        $commande->adresse=$request->get("adresse");
        $commande->product_id=$request->get("product_id");
        $commande->qte=$request->get("qte");
        $commande->data="(".$request->get("pname").",".$request->get("qte").",".$request->get("price")."dh";
        $commande->save();
        return redirect()->route("completed");
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
    public function show(Request $request)
    {
       return view("public.checkout")->with(["data"=>$request]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, commande $commande)
    {
       $this->updateStatus($request->get("id"),$request->get("status"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(commande $commande)
    {
        //
    }
}
