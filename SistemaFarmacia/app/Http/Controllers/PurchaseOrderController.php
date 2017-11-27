<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PurchaseOrder;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PurchaseFormRequest;
use App\Http\Controllers\Session;
use DB;
use Exception;
use Alert;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          if($request){
           $purchases = PurchaseOrder::where('status','=','1')->orderBy('id', 'desc')->paginate(7);
           return view("purchase.index",[
                            "purchases"   =>  $purchases
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
        $product = DB::table('products')->where('status','=','1')->get();
        $provider =DB::table('providers')->where('status','=','1')->get();
        $employee =DB::table('employees')->where('status','=','1')->get();
        return view("purchase.create",[
                          "products"=>$product,
                          "providers"=>$provider,
                          "employees"=>$employee                     
                  ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     try {
            $purchase = new PurchaseOrder;
            $purchase->order_date = $request->get('order_date');
            $purchase->required_date = $request->get('required_date');
            $purchase->date_of_delivery = $request->get('date_of_delivery');
            $purchase->status=1;
            $purchase->provider_id = $request->get('provider_id');
            $purchase->employee_id = $request->get('employee_id');
                    
            if ($purchase->save()) {
                Alert::success('Success Message','se ha Guardado la Orden de Compra')->persistent('Close');
                        return Redirect('purchase');
            }else{
                Alert::Warning('Warning Message', 'No se pudo Guardar la Orden de Compra')->persistent('Close');
                        return Redirect('purchase');
            }
                    
        } catch (Exception $e) {
            Alert::error('Error Message','ha ocurrido un error al Registrar la Compra'.$e)->persistent('Close'); 
                    return redirect()->route('purchase.create');      
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
        $purchase  =  PurchaseOrder::findOrFail($id);
        $providers =  DB::table('providers')->where('status','=','1')->get();
        $employees =  DB::table('employees')->where('status','=','1')->get();
        return view("purchase.show",[
                                    "purchases" =>  $purchase,
                                    "providers" =>  $providers,
                                    "employees" =>  $employees,                                  
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
        $purchase  =  PurchaseOrder::findOrFail($id);
        $providers =  DB::table('providers')->where('status','=','1')->get();
        $employees =  DB::table('employees')->where('status','=','1')->get();
        return view("purchase.edit",[
                                    "purchases" =>  $purchase,
                                    "providers" =>  $providers,
                                    "employees" =>  $employees,                                  
                ]);  
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
        try {
            $purchase = PurchaseOrder::findOrFail($id);
            $purchase->order_date = $request->get('order_date');
            $purchase->required_date = $request->get('required_date');
            $purchase->date_of_delivery = $request->get('date_of_delivery');
            $purchase->status=1;
            $purchase->employee_id = $request->get('employee_id');
            $purchase->provider_id = $request->get('provider_id');
            if ($purchase->update()) {
                Alert::success('Success Message','se ha Modificado la Orden de Compra')->persistent('Close');
                return Redirect('purchase');
            }else{
                Alert::Warning('Warning Message', 'No se pudo Modificar la Orden de Compra')->persistent('Close');
                return Redirect('purchase');
            }
            
        } catch (Exception $e) {
            Alert::error('Error Message','ha ocurrido un error al Registrar la Compra'.$e)->persistent('Close'); 
            return redirect()->route('purchase.create');

            
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
        try{
            $purchase = PurchaseOrder::findOrFail($id);
            $purchase->status=0;
            if($purchase->update()){
                Alert::success('Success Message', 'El Producto ha sido Eliminado!!!');
                return redirect("purchase");
            }else{
                Alert::warning('Warning Message','No se pudo eliminar el Registro');
                return redirect('purchase');
            }
        }catch(Exception $e){
            Alert::error('Error Message','No se pudo eliminar el Registro');
                return redirect('purchase');
        }
    }
}
