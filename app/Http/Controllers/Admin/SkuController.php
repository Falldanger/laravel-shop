<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Sku;
use Illuminate\Http\Request;

class SkuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Product $product)
    {
        $skus = $product->skus()->paginate(10);
        return view('auth.skus.index', compact('skus', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Product $product
     * @return void
     */
    public function create(Product $product)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Product $product
     * @return void
     */
    public function store(Request $request, Product $product)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @param \App\Models\Sku $sku
     * @return void
     */
    public function show(Product $product, Sku $sku)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @param \App\Models\Sku $sku
     * @return void
     */
    public function edit(Product $product, Sku $sku)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Product $product
     * @param \App\Models\Sku $sku
     * @return void
     */
    public function update(Request $request, Product $product, Sku $sku)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @param \App\Models\Sku $sku
     * @return void
     */
    public function destroy(Product $product, Sku $sku)
    {
        //
    }
}
