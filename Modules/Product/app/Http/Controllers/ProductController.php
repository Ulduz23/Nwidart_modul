<?php

namespace Modules\Product\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Modules\Product\app\Http\Requests\ProductRequest;
use Illuminate\Http\Response;
use Modules\Product\app\Models\Product;
use Modules\Category\app\Models\Category;
use Illuminate\Support\Str;
use Modules\Product\app\Models\Gallery;
use Illuminate\Support\Facades\DB;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $lang = config('app.locale');

        
        $products = Product::select("cat_id","title_$lang as title", "description_$lang as description", "image")
        ->with(['category' => function ($query) use ($lang) {
            $query->select("id", "title_$lang as title");
        }])
        ->get();
        $categories = Category::select("id","title_$lang as title")->get();

    
        return view('product::index', get_defined_vars());
    }

    public function create(){
        return view('product::create');
    }

    public function store(ProductRequest $request){
        $product = new Product();
        $product->title_az = $request->title_az;
        $product->title_en = $request->title_en;
        $product->title_ru = $request->title_ru;
        $product->description_az = $request->description_az;
        $product->description_en = $request->description_en;
        $product->description_ru = $request->description_ru;
        $product->cat_id = $request->cat_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'product_' . Str::random(13) . '.' . $image->getClientOriginalExtension();
            $directory = 'product/';
            $image->move($directory, $name);
            $name = $directory . $name;
            $product->image = $name;
        }

        return redirect()->back()->with($product->save ? 'success' : 'error', true);
        

    }
    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('product::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('product::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
