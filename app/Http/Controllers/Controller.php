<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function home(Request $request)
    {
        $products=$this->getAllProduct();
       return view("public.index")->with(["products"=>$products]);
    }
    public function getProductById($id){
        return DB::table("products")->where(["id"=>$id])->first();
    }
    public function getAllProduct(){
        return DB::table("products")->get();
    }
    public function getProductByCategorie($categorie){
        return DB::table("products")->where(["categorie"=>$categorie])->get();
    }

}
