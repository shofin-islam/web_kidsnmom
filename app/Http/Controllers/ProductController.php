<?php

    

namespace App\Http\Controllers;

    

use App\Models\Product;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Manufacturer;
use DB;
    

class ProductController extends Controller

{ 

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    function __construct()

    {

         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','show']]);

         $this->middleware('permission:product-create', ['only' => ['create','store']]);

         $this->middleware('permission:product-edit', ['only' => ['edit','update']]);

         $this->middleware('permission:product-delete', ['only' => ['destroy']]);

    }

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {
                $products = Product::select(
                    'products.*',
                    'categories.categoryName',
                    'manufacturers.manufacturerName'
                )
                ->join('categories', 'products.categoryId', '=', 'categories.id')
                ->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
                ->where('products.publicationStatus',1)
                ->where('products.deletionStatus',0)
                ->paginate(100);

            return view('products.index',compact('products'));

    }

    

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create()

    {
        $manufacturers = Manufacturer::where('publicationStatus', 1)->get();
        $categorys = Category::where('publicationStatus', 1)->get();

        return view('products.create',['manufacturers' => $manufacturers, 'categorys' => $categorys]);

    }

    

    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request)

    {

        request()->validate([

            'name' => 'required',
            'categoryId' => 'required|not_in:0',
            'manufacturerId' => 'required|not_in:0',
            'purchasePrice' => 'required|numeric|between:1,999999999',
            'salesPrice' => 'required|numeric|between:1,999999999',
            'productQuantity' => 'required|min:1|numeric|gt:0',
            'totalAmount' => 'required|numeric|between:0,999999999',
            'dueAmount' => 'required|numeric|between:0,999999999',
            'publicationStatus' => 'required|not_in:0',
        ]);

        // Product::create($request->all());

        $product = new Product();

        $product->name = $request->name;
        $product->productCode = $request->productCode;
        $product->categoryId = $request->categoryId;
        $product->manufacturerId = $request->manufacturerId;
        $product->purchasePrice = $request->purchasePrice;
        $product->salesPrice = $request->salesPrice;
        $product->productQuantity = $request->productQuantity;
        $product->totalAmount = $request->totalAmount;
        $product->dueAmount = $request->dueAmount;
        $product->details = $request->details;
        $product->publicationStatus = $request->publicationStatus;
        $product->save();
        
        return redirect()->route('products.index')->with('success','Product created successfully.');
    }

    

    /**

     * Display the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function show(Product $product)

    {

        $product_id = $product->id;
        $productById = DB::table('products')
                ->join('categories', 'products.categoryId', '=', 'categories.id')
                ->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
                ->select('products.*', 'categories.categoryName', 'manufacturers.manufacturerName')
                ->where('products.id', $product_id)
                ->first();
        return view('products.show', ['products' => $productById]);
    }

    

    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function edit(Product $product)

    {
        $product_id = $product->id;
        
        $productById = DB::table('products')
                ->join('categories', 'products.categoryId', '=', 'categories.id')
                ->join('manufacturers', 'products.manufacturerId', '=', 'manufacturers.id')
                ->select('products.*','products.id as pid','categories.id','manufacturers.id','categories.categoryName', 'manufacturers.manufacturerName')
                ->where('products.id', $product_id)
                ->first();

        $manufacturers = Manufacturer::where('publicationStatus', 1)->get();
        $categorys = Category::where('publicationStatus', 1)->get();
        
        // dd($productById);

        return view('products.edit',['product' => $productById,'manufacturers' => $manufacturers, 'categorys' => $categorys]);

    }

    

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {
        
        request()->validate([

            'name' => 'required',
            'categoryId' => 'required|not_in:0',
            'manufacturerId' => 'required|not_in:0',
            'purchasePrice' => 'required|numeric|between:1,999999999',
            'salesPrice' => 'required|numeric|between:1,999999999',
            'productQuantity' => 'required|min:1|numeric|gt:0',
            'totalAmount' => 'required|numeric|between:0,999999999',
            'dueAmount' => 'required|numeric|between:0,999999999',
            'publicationStatus' => 'required|not_in:0',
        ]);
        // dd($request);
        $productById = Product::find($id);
        // dd($productById);
        $productById->name = $request->name;
        $productById->productCode = $request->productCode;
        $productById->categoryId = $request->categoryId;
        $productById->manufacturerId = $request->manufacturerId;
        $productById->purchasePrice = $request->purchasePrice;
        $productById->salesPrice = $request->salesPrice;
        $productById->productQuantity = $request->productQuantity;
        $productById->totalAmount = $request->totalAmount;
        $productById->dueAmount = $request->dueAmount;
        $productById->details = $request->details;
        $productById->publicationStatus = $request->publicationStatus;
        $productById->save();

        return redirect()->route('products.index')->with('success','Product updated successfully');

    }

    

    /**

     * Remove the specified resource from storage.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function destroy(Product $product)

    {

        // $product->delete();
        
        $product->deletionStatus = 1;
        $product->save();
        return redirect()->route('products.index')->with('success','Product deleted successfully') ;

    }

}