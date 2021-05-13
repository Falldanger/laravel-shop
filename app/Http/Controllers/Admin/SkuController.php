<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SkuRequest;
use App\Models\Product;
use App\Models\Sku;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SkuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $skus = $product->skus()->paginate(10);
        return view('auth.skus.index', compact('skus', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  Product  $product
     * @return void
     */
    public function create(Product $product)
    {
        return view('auth.skus.form', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product  $product
     * @return void
     */
    public function store(SkuRequest $request, Product $product)
    {
        $params = $request->all();
        $params['product_id'] = $request->product->id;
        $skus = Sku::create($params);
        $skus->propertyOptions()->sync($request->property_id);
        return redirect()->route('skus.index', $product);
    }

    /**
     * Display the specified resource.
     *
     * @param  Product  $product
     * @param  Sku  $sku
     * @return void
     */
    public function show(Product $product, Sku $sku)
    {
        return view('auth.skus.show', compact('product', 'sku'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product  $product
     * @param  Sku  $sku
     * @return void
     */
    public function edit(Product $product, Sku $sku)
    {
        return view('auth.skus.form', compact('product', 'sku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Product  $product
     * @param  Sku  $sku
     * @return void
     */
    public function update(Request $request, Product $product, Sku $sku)
    {
        $params = $request->all();
        $params['product_id'] = $request->product->id;
        $sku->update($params);
        $sku->propertyOptions()->sync($request->property_id);
        return redirect()->route('skus.index', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @param  Sku  $sku
     * @return void
     * @throws \Exception
     */
    public function destroy(Product $product, Sku $sku)
    {
        $sku->delete();
        return redirect()->route('skus.index', $product);
    }
}
