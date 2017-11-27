<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DetailProduct;
use App\Product;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\DetailProductFormRequest;
use App\Http\Controllers\Session;
use Response;
use Illuminate\Support\Collection;

use DB;
use Exception;
use Alert;

class DetailProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         if($request){
           $query = trim($request->get('searchText'));
           $dproducts = DetailProduct::where('id','=','$id')
           ->orderBy('id', 'desc')->paginate(7);
           return view("product.show",[    
                            "dproducts"   =>  $dproducts,
                            "searchText" =>  $query
                    ]);
    }
}
    public function create()
    {   
        $products =DB::table('products')->where('status','=','1')->get();
        return view("detailproduct.create",[
                          "product"=>$products                     
                  ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DetailProductFormRequest $request)
    {
        try {
            $dproduct = new DetailProduct;
            $quantity->quantity = $request->get('quantity');
            $restriction->restriction = $request->get('restriction');
            $aviable->aviable = $request->get('aviable');
            $product_id->product_id = $request->get('product_id');  
            $cont = 0;
            while($cont<count($product_id)){
                $detail=new DetailProduct();
                $detail->quantity = $quantity[$cont];
                $detail->restriction = $restriction[$cont];
                $detail->aviable = $aviable[$cont];
                $detail->product_id = $product_id[$cont];
                 if ($detail->save()) {
                Alert::success('Success Message','se ha Guardado el Detalle del Producto')->persistent('Close');
                return Redirect('product.show');
            }else{
                Alert::Warning('Warning Message', 'No se pudo Guardar el Detalle del Producto')->persistent('Close');
                return Redirect('product.show');
            }
              $cont=$cont+1;
            }  
        } catch (Exception $e) {
            Alert::error('Error Message','ha ocurrido un error al Registrar  el detalle del producto'.$e)->persistent('Close'); 
            return redirect()->route('product.show');
            DB::rollback();           
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
        $dproduct        = DetailProduct::findOrFail($id);
        $p              =  DB::table('products')->where('status','=','1')->get();
        $providers      =  DB::table('providers')->where('status','=','1')->get();
        $laboratories   =  DB::table('laboratories')->where('status','=','1')->get();
        $categories     =  DB::table('categories')->where('status','=','1')->get();

        return view("detailproduct.show",[
                                    "product"        =>  $dproduct,
                                    "products"        =>  $dp,
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
        $dproduct       =  DetailProduct::findOrFail($id);
        $providers      =  DB::table('providers')->where('status','=','1')->get();
        $laboratories   =  DB::table('laboratories')->where('status','=','1')->get();
        $categories     =  DB::table('categories')->where('status','=','1')->get();

        return view("detailproduct.edit",[
                                    "product"        =>  $dproduct,
                                    "products"       =>  $dp,
                                    "providers"      =>  $providers,
                                    "laboratories"   =>  $laboratories,
                                    "categories"     =>  $categories
                                   
                ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DetailProductFormRequest $request, $id)
    {
        try {
            $dproduct = DetaildProduct::findOrFail($id);
            $dproduct->quantity = $request->get('quantity');
            $dproduct->restriction = $request->get('restriction');
            $dproduct->aviable = $request->get('aviable');
            $dproduct->product_id = $request->get('product_id');     
            if ($dproduct->update()) {
                Alert::success('Success Message','se ha Modificado el Detalle del Producto')->persistent('Close');
                return Redirect('detailproduct');
            }else{
                Alert::Warning('Warning Message', 'No se pudo Modificar el Detalle del Producto')->persistent('Close');
                return Redirect('detailproduct');
            } 
        } catch (Exception $e) {
            Alert::error('Error Message','ha ocurrido un error al Registrar  el detalle del producto'.$e)->persistent('Close'); 
            return redirect()->route('detailproduct.create');
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
        
    }
}
