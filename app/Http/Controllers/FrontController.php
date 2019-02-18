<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;

class FrontController extends Controller
{
    protected $paginate = 6;

    public function __construct(){
 
        view()->composer('partials.menu', function($view){
            $categories = Category::pluck('title', 'id')->all();
            $view->with('categories', $categories );
        });
    }

    public function index(){
        $count =  Product::status()->count();
        $products = Product::status()->orderBy('id', 'desc')->paginate($this->paginate);
        return view('front.index', ['products' => $products, 'count' => $count]); 
    }

    public function show(int $id){
        $products = Product::select('size')->distinct()->orderByRaw('size ASC')->get();
        $product = Product::find($id);
        return view('front.show', ['product' => $product, 'products'=>$products]);
    }

    public function showProductByCode(){
        $products = Product::code()->orderBy('id', 'desc')->paginate($this->paginate);
        $count = Product::code()->count();
        return view('front.solde', ['products' => $products, 'count' => $count]);
    }

    public function showProductByCategory(string $title){
        
        $category= Category::where('title', $title)->first();
        $count = Product::where('category_id', $category->id)->get()->count();
        $products = $category->products()->orderBy('id', 'desc')->paginate($this->paginate);
        return view('front.category', ['products' => $products, 'category' => $category, 'count' => $count]);
    }


}
