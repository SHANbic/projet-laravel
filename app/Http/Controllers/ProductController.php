<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Product;
use App\Category;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $paginate = 10;
    
    public function index()
    {
        $products = DB::table('products')->orderBy('id', 'desc')->paginate($this->paginate); 
        $categories = Category::pluck('title', 'id')->all();
        return view('back.product.index', ['products' => $products, 'categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $products = Product::all();
         $product = Product::select('size')->distinct()->orderByRaw('size ASC')->get();
         $categories = Category::pluck('title', 'id')->all();
         return view('back.product.create', ['products' => $products, 'product'=>$product, 'categories' =>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'reference'=>'required'
            
        ]);
        
        $product = Product::create($request->all());
        $im = $request->file('picture');
        
        if (!empty($im)) {
            
            $link = $request->file('picture')->store('images');
            
            $product->update([
                'url_image' => $link,
            ]);
        } 
        //dump($request->all());
        return redirect()->route('product.index')->with('message', 'Article ajouté avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $article = Product::find($id);
         $product = Product::select('size')->distinct()->orderByRaw('size ASC')->get();
         $categories = Category::pluck('title', 'id')->all();
         return view('back.product.edit', ['article' => $article, 'product'=>$product, 'categories' =>$categories]);
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
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'reference'=>'required'
        ]);
        
        $product = Product::find($id);
        $product->update($request->all());
        
        $im = $request->file('picture');
        
        if (!empty($im)) {
            
            $link = $request->file('picture')->store('images');
            
            
            $product->update([
                'url_image' => $link,
            ]);
        } 
        //dump($request->all());
        return redirect()->route('product.index')->with('message', 'Article modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        return redirect()->route('product.index')->with('message', 'Article supprimé avec succès');
    }
}
