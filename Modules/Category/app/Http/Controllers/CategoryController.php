<?php

namespace Modules\Category\app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Category\app\Models\Category;
use Modules\Category\app\Http\Requests\CategoryRequest;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $lang = config('app.locale');

        $categories = Category::select("id","title_$lang as title", "description_$lang as description", "image")->get();

        return view('category::index', get_defined_vars());
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request){
        $category = new Category();
        $category->title_az = $request->title_az;
        $category->title_en = $request->title_en;
        $category->title_ru = $request->title_ru;
        $category->description_az = $request->description_az;
        $category->description_en = $request->description_en;
        $category->description_ru = $request->description_ru;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'category_' . Str::random(13) . '.' . $image->getClientOriginalExtension();
            $directory = 'category/';
            $image->move($directory, $name);
            $name = $directory . $name;
            $category->image = $name;
        }
        $category->save();

        return redirect()->back()->with('success', 'Cateqoriya uğurla əlavə edildi');
        

    }

    public function show($id)
    {
        return view('category::show');
    }

    public function edit($id)
    {
        $catedit = Category::find($id);
        return view('category::edit', get_defined_vars());
    }

    
    public function update(CategoryRequest $request){
        $category = Category::find($request->id);

        if (!$category) {
            return redirect()->back()->with('error', 'Cateqoriya tapılmadı');
        }

        $category->title_az = $request->title_az;
        $category->title_en = $request->title_en;
        $category->title_ru = $request->title_ru;
        $category->description_az = $request->description_az;
        $category->description_en = $request->description_en;
        $category->description_ru = $request->description_ru;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = 'category_' . Str::random(13) . '.' . $image->getClientOriginalExtension();
            $directory = 'category/';
            $image->move($directory, $name);
            $name = $directory . $name;
            $category->image = $name;
        }

        $category->save();

        return redirect()->back()->with('success', 'Cateqoriya uğurla yeniləndi');
    }


    
    public function destroy($id)
    {
        //
    }
}
