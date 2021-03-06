<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProductFormRequest;
use App\Http\Controllers\Session;

use DB;
use Exception;
use Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){

    }
    public function index(Request $request)
    {
        if($request){
           $query = trim($request->get('searchText'));
           $products = Product::where('name','LIKE','%'.$query.'%')
           ->where('status','=','1')->orderBy('id', 'desc')->paginate(7);
           return view("product.index",[
                            "products"   =>  $products,
                            "searchText" =>  $query
                    ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provider =DB::table('providers')->where('status','=','1')->get();
        $category =DB::table('categories')->where('status','=','1')->get();
        $laboratories =DB::table('laboratories')->where('status','=','1')->get();
        return view("product.create",[ 
                        "providers"=>$provider,
                        "laboratories"=>$laboratories,
                          "categories"=>$category
                        
                  ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        try {
            $product = new Product;
            $product->status=1;
            $product->name = $request->get('name');
            $product->presentation = $request->get('presentation');
            $product->description = $request->get('description');
            $product->existence = $request->get('existence');
            $product->reference = $request->get('reference');
            $product->provider_id = $request->get('provider_id');
            $product->category_id = $request->get('category_id');
            $product->laboratory_id = $request->get('laboratory_id');
            
            if ($product->save()) {
                Alert::success('Success Message','se ha Guardado el producto')->persistent('Close');
                return Redirect('product');
            }else{
                Alert::Warning('Warning Message', 'No se pudo Guardar el Producto')->persistent('Close');
                return Redirect('product');
            }
            
        } catch (Exception $e) {
            Alert::error('Error Message','ha ocurrido un error al Registrar el producto'.$e)->persistent('Close'); 
            return redirect()->route('product.create');

            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product        =  Product::findOrFail($id);
        $p      =  DB::table('products')->where('status','=','1')->get();
        $providers      =  DB::table('providers')->where('status','=','1')->get();
        $laboratories   =  DB::table('laboratories')->where('status','=','1')->get();
        $categories     =  DB::table('categories')->where('status','=','1')->get();

        return view("product.show",[
                                    "product"        =>  $product,
                                    "products"        =>  $p,
                                    "providers"      =>  $providers,
                                    "laboratories"   =>  $laboratories,
                                    "categories"     =>  $categories
                                   
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product        =  Product::findOrFail($id);
        $providers      =  DB::table('providers')->where('status','=','1')->get();
        $laboratories   =  DB::table('laboratories')->where('status','=','1')->get();
        $categories     =  DB::table('categories')->where('status','=','1')->get();

        return view("product.edit",[
                                    "product"        =>  $product,
                                    "providers"      =>  $providers,
                                    "laboratories"   =>  $laboratories,
                                    "categories"       =>  $categories
                                   
                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $request, $id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->name = $request->get('name');
            $product->presentation=$request->get('presentation');
            $product->description=$request->get('description');
            $product->existence=$request->get('existence');
            $product->reference=$request->get('reference');
            $product->provider_id= $request->get('provider_id');
            $product->laboratory_id=$request->get('laboratory_id');
            $product->category_id=$request->get('category_id');
            if ($product->update()) {
                Alert::success('Success Message', 'El producto ha sido modificado!!!');
                return redirect("product");
            }else{
                Alert::warning('Warning Message', 'No se pudo modificar el registro!!!');
                return redirect("product.edit");
            }
        } catch (Exception $e) {
                Alert::error('Error Message', 'No se pudo modificar el registro!!!');
                return redirect()->route("product.edit");
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);
            $product->status=0;
            if($product->update()){
                Alert::success('Success Message', 'El Producto ha sido Eliminado!!!');
                return redirect("product");
            }else{
                Alert::warning('Warning Message','No se pudo eliminar el Registro');
                return redirect('product');
            }
        } catch (Exception $e) {
            Alert::error('Error Message','No se pudo eliminar el Registro');
                return redirect('product');
            
        }
    }
}
