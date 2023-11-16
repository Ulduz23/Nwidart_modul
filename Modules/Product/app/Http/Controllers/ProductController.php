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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $products = new Product();
        $products->title_az = $request->title_az;
        $products->title_en = $request->title_en;
        $products->title_ru = $request->title_ru;
        $products->description_az = $request->description_az;
        $products->description_en = $request->description_en;
        $products->description_ru = $request->description_ru;
        $products->cat_id = $request->cat_id;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'product_'.Str::random(13).'.' . $image->getClientOriginalExtension();
            $directory = 'product/';
            $image->move($directory, $name);
            $name = $directory.$name;
            $products->image = $name;
        }
        return redirect()->back()->with($products->save() ? 'success' : 'error',true);

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
