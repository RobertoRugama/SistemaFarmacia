<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ChargeFormRequest;
use SistemaFarmacia\App\Http\Requests;
use \App\Charge;
use App\Http\Controllers\Session;
use App\Http\Requests\TaskRequest;

use DB;
use Exception;
use Alert;  



class ChargeController extends Controller
{
     public function __construct(){

    }

    public function index(Request $request){

        if ($request) {
           $query=trim($request->get('searchText'));
           $charges=DB::table('charges')
           ->where('name','LIKE','%'.$query.'%')
           ->where('status','=','1')->orderBy('id','desc')->paginate(7);
           return view('charge.index',["charges"=>$charges,"searchText"=>$query]);
        }
    }

     public function create()
    {
        //
        return view('charge.create');
    }

    public function store(ChargeFormRequest $request)
    {
        try {
            $charge = new Charge;
            $charge->status=1;
            $charge->name=$request->get('name');
            $charge->description=$request->get('description');
            $charge->salary=$request->get('salary');
           if ($charge->save()) {
                 Alert::success('Success Message','se ha Guardado el Registro')->persistent(3500);
                return redirect('charge');
            }else{
                  Alert::warning('Warning Message','ups!! no se pudo Guardar el Registro')->persistent(3500);
                return redierect('charge.create');
            }
            
            
        } catch (Exception $e) {
            Alert::error('error Message','Error al insertar la data Porfavor Verificar los campos vacios')->persistent('close');
             return redirect()->route('charge.create');
        }
    }

    public function show($id)
    {
      return view("charge.show",["charge"=>Charge::findOrFail($id)]);
    }

    public function edit($id)
    {
      return view("charge.edit",["charge"=>Charge::findOrFail($id)]);
    }

    public function update(ChargeFormRequest $request, $id)
    {
        try {
            $charge = Charge::findOrFail($id);
            $charge->name=$request->get('name');
            $charge->description=$request->get('description');
            $charge->salary=$request->get('salary');
           if ($charge->update()) {
                 Alert::success('Success Message','se ha Modificado el Registro')->persistent(3500);
                return redirect('charge');
            }else{
                  Alert::warning('Warning Message','ups!! no se pudo Modificar el Registro')->persistent(3500);
                return redierect('charge.create');
            }
            
            
        } catch (Exception $e) {
            Alert::error('error Message','Error al insertar la data Porfavor Verificar los campos vacios')->persistent('close');
             return redirect()->route('charge.create');
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
            $charge=Charge::findOrFail($id);
            $charge->status=0;
            if ($charge->update()) {
                 Alert::success('Success Message','El Registro ha sido Eliminado!!!');
                return redirect('charge');
            }else{
                Alert::warning('Warning Message','No se pudo Eliminar el Registro!!!');
                return redirect('charge.create');
            }
        } catch (Exception $e) {
             Alert::error('Error Message', 'Error en la data insertar Verificar si hay campos vacios')->persistent('close');
           return redirect()->route('charge.create'); 
        }
    }
}
