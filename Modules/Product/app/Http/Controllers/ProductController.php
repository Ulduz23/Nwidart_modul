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
    public function index(){
        $lang = config('app.locale');

        
        $products = Product::select("id","cat_id","title_$lang as title", "description_$lang as description", "image")
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
        $product->save();
        return redirect()->back()->with('success', 'Məhsul uğurla əlavə edildi');
        

    }
    
    public function show($id){
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('product.index')->with('error', 'Mehsul bulunamadı');
        }

        return view('product::show', compact('product'));
    }

    
    public function edit($id){
        $lang = config('app.locale');
        $edit = Product::find($id);
        $categories = Category::select("id","title_$lang as title")->get();

        return view('product::edit', get_defined_vars());
    }

    
    public function update(ProductRequest $request){
        $product = Product::find($request->id);

        if (!$product) {
            return redirect()->back()->with('error', 'Məhsul tapılmadı');
        }
        $product->cat_id = $request->cat_id;
        $product->title_az = $request->title_az;
        $product->title_en = $request->title_en;
        $product->title_ru = $request->title_ru;
        $product->description_az = $request->description_az;
        $product->description_en = $request->description_en;
        $product->description_ru = $request->description_ru;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'product_' . Str::random(13) . '.' . $image->getClientOriginalExtension();
            $directory = 'product/';
            $image->move($directory, $name);
            $name = $directory . $name;
            $product->image = $name;
        }

        $product->save();

        return redirect()->back()->with('success', 'Məhsul uğurla yeniləndi');
    }
    

    public function destroy(Product $product){
        $product->delete();

        return redirect()->back()->with('success', 'Məhsul uğurla silindi');
    }


    public function gallerylist(){
        $lang = config('app.locale');

        $gallery = Gallery::select("id","product_id","image")
        ->with(['getProducts' => function ($query) use ($lang) {
            $query->select("id", "title_$lang as title");
        }])
        ->get();
        $products = Product::select("id","title_$lang as title")->get();

    
        return view('product::galleryadd', get_defined_vars());
    }

    public function galleryadd(Request $request){    
        $gallery = new Gallery();
        $gallery->product_id = $request->product_id;
        $imagePaths = [];

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $name = 'gallery_' . Str::random(13) . '.' . $image->getClientOriginalExtension();
                $directory = 'gallery/';
                $image->move($directory, $name);
                $imagePaths[] = $directory . $name;
            }
        }

        $imageString = implode(',', $imagePaths);
        $gallery->image = $imageString;
        $gallery->save();

        return redirect()->back()->with('success', 'Şəkillər uğurla əlavə edildi');

    }
    public function galleryedit($id){
        $lang = config('app.locale');
        $edit = Gallery::find($id);

        $products = Product::select("id","title_$lang as title")->paginate(10);

    
        return view('product::galleryedit', get_defined_vars());
    }

    public function galleryUpdate(Request $request){
        $gallery = Gallery::find($request->id);

        if (!$gallery) {
            return redirect()->back()->with('error', 'Galeri bulunamadı');
        }
        $gallery->product_id = $request->product_id;

        $existingImages = explode(',', $gallery->image);

        if ($request->hasFile('image')) {
            foreach ($request->file('image') as $image) {
                $name = 'gallery_' . Str::random(13) . '.' . $image->getClientOriginalExtension();
                $directory = 'gallery/';
                $image->move($directory, $name);
                $existingImages[] = $directory . $name;
            }
        }

        $imageString = implode(',', $existingImages);

        $gallery->image = $imageString;
        $gallery->save();

        return redirect()->back()->with('success', 'Galeri başarıyla güncellendi');
    }

    public function gallerydelete($id){
        $gallery = Gallery::find($id);

        $gallery->delete();

        return redirect()->back()->with('success', 'Gallery uğurla silindi');
    }
}
