<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class ProductController extends Controller
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
    // {,"name":"hamza madani","price":"12","categorie":"general","description":"&&&&&&&&&&","main_image":{},"images":{}}
    public function create(Request $request)
    {
        // $request->validate([
        //     "name" => "required",
        //     "categorie" => "required",
        //     "description" => "required",
        //     "price" => "required|numeric",
        //     'main_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     'images' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        //     // '|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
        // ]);
        // return $request;
        $product = new product();
        $product->name = $request->get("name");
        $product->price = $request->get("price");
        $product->categorie = $request->get("categorie");
        $product->description = $request->get("description");

        if ($request->hasFile('main_image')) {
            $image = $request->file('main_image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('admin/main_image/'), $imageName);
            $product->main_image = "admin/main_image/$imageName";
        }
        $imageList=[];
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            foreach ($images as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('admin/images/'), $imageName);
                array_push($imageList,"admin/images/$imageName");
            }



            $product->main_image = "admin/main_image/$imageName";
        }
        
        $product->images=$pieces = implode(",", $imageList);
        $product->save();
        return redirect()->route("admin_home");
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
    public function showOne($id)
    {
        $product = DB::table("products")->where(["id" => $id])->first();
        return view("public.product")->with([
            "product" => $product
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function showAll()
    {
        $products=DB::table("products")->get();
        return view("admin.products")->with(["products"=>$products]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // return $request;
        DB::table("products")->delete($request->id);
        return back();
    }
    public function getProductById($id)
    {
        return DB::table("products")->where(["id" => $id])->first();
    }
    public function getAllProduct()
    {
        return DB::table("products")->get();
    }
    public function getProductByCategorie($categorie)
    {
        return DB::table("products")->where(["categorie" => $categorie])->get();
    }
}
