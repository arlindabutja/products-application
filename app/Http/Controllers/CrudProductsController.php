<?php

namespace App\Http\Controllers;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CrudProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products      =       Products::all();
        return view("index", compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator          =       $request->validate([
            "name"              =>          "required",
            "description"       =>          "required",
            "long_description"  =>          "required",
            "barcode"           =>          "required",
            "stock"             =>          "required",
            "price"             =>          "required"
        ]);

        $name              =           $request->name;

        //$slug               =           str_replace(" ", "-", strtolower($name));
        //$slug               =           preg_replace("[/A-Za-z0-9/]", "-", $slug);
        //$slug               =           preg_replace("[/*&%/]", "-", $slug);

        $productsData           =       array(
            "name"              =>         $request->name,
            "description"       =>         $request->description,
            "long_description"       =>    $request->long_description,
            "barcode"          =>          $request->barcode,
            "stock"            =>          $request->stock,
            "price"            =>          $request->price 

        );

        $product               =       Products::create($productsData);

        if(!is_null($product)) {
            return back()->with("success", "Product published successfully");
        } else {
            return back()->with("error", "Whoops! failed to store the product");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // show specific product
        $product       =       Products::find($id);
        return view("show-product", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // edit the information about specific product
        $product       =       Products::find($id);
        return view("edit-product", compact("product"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator          =       $request->validate([
            "name"              =>          "required",
            "description"       =>          "required",
            "long_description"  =>          "required",
            "barcode"           =>          "required",
            "stock"             =>          "required",
            "price"             =>          "required"
        ]);

        $name              =           $request->name;
        //$slug               =           str_replace(" ", "-", strtolower($name));
        //$slug               =           preg_replace("[/A-Za-z0-9/]", "-", $slug);
        //$slug               =           preg_replace("[/*&%/]", "-", $slug);

        $productData       =       array(
            "name"              =>         $request->name,
            "description"       =>         $request->description,
            "long_description"       =>    $request->long_description,
            "barcode"          =>          $request->barcode,
            "stock"            =>          $request->stock,
            "price"            =>          $request->price
        );

        $product               =       Products::find($id)->update($productData);
        if($product == 1) {
            return back()->with("success", "Product updated successfully");
        } else {
            return back()->with("failed", "Whoops! Failed to update the product");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete specific product
        $product = Products::find($id)->delete();
        if($product == 1) {
            return back()->with("success", "Product deleted successfully");
        } else {
            return back()->with("failed", "Failed to delete product");
        }
    }
}
