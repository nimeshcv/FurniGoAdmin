<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use App\Models\Category;
use Illuminate\Http\Request;

class FurnitureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Furniture::latest()->paginate(5);
        $cats = Category::get();
        return view('furniture.index', compact('product', 'cats'));
    }


    public function productdetailindex($id)
    {
        $product = Furniture::where('id', $id)->get()->first();
        return view('productdetail', compact('product'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $c = Category::get(); //select * from category
        return view('furniture.create', ['data' => $c]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            "product_name" => 'required',
            "price" => "required | numeric | min:1",
            "category" => 'required',
            "desc" => "required",
            "pic1" => "required",
            "primary_material" => "required",
            "weight" => "required",
            "dimension" => "required",
            "specification" => "required",

        ]);


        $table = new Furniture;


        $imgName1 = time() . '0.' . $request->pic1->extension();
        $request->pic1->move(public_path('images'), $imgName1);
        $table->pic1 = "/images/" . $imgName1;


        if (isset($request->pic2)) {
            $imgName2 = time() . '1.' . $request->pic2->extension();
            $request->pic2->move(public_path('images'), $imgName2);
            $table->pic2 = "/images/" . $imgName2;
        
        }


        if (isset($request->pic3)) {
            $imgName3 = time() . '2.' . $request->pic3->extension();
            $request->pic3->move(public_path('images'), $imgName3);
            $table->pic3 = "/images/" . $imgName3;
        }

        $table->productname = $request->product_name;
        $table->price = $request->price;
        $table->category = $request->category;
        $table->desc = $request->desc;
        $table->primary_material = $request->primary_material;
        $table->weight = $request->weight;
        $table->dimension = $request->dimension;
        $table->specification = $request->specification;

        $table->save();
        return redirect('furnitures')->withSuccess('Added Successfully!!!!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Furniture $furniture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $product = Furniture::get()->where('id', $id)->first(); //select * from category where id=id
        $category = Category::get(); //select * from category;
        return view('furniture.delete', compact('product', 'category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Furniture::find($id);
        if (isset($request->pic1)) {
            $imgName = time() . '.' . $request->pic1->extension();
            $request->pic1->move(public_path('images'), $imgName);
            $product->pic1 ="/images/" . $imgName;
        }
        if (isset($request->pic2)) {
            $imgName2 = time() . '.' . $request->pic2->extension();
            $request->pic2->move(public_path('images'), $imgName2);
            $product->pic2 = "/images/" . $imgName2;
        }


        if (isset($request->pic3)) {
            $imgName3 = time() . '.' . $request->pic3->extension();
            $request->pic3->move(public_path('images'), $imgName3);
            $product->pic3 = "/images/" . $imgName3;
        }

        $product->productname = $request->product_name;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->desc = $request->desc;

        $product->primary_material = $request->primary_material;
        $product->weight = $request->weight;
        $product->dimension = $request->dimension;
        $product->specification = $request->specification;


        $product->save();
        return redirect('furnitures')->withSuccess('product updatedddddd!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Furniture $furniture)
    {

        $furniture->delete();
        return redirect('furnitures')->withSuccess('product deletedddd....!!');
    }
}
