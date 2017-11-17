<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EmployeeFormRequest;
use App\Http\Controllers\Session;

use DB;
use Exception;
use Alert;
class EmployeeController extends Controller
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
           $employees = Employee::where('first_name','LIKE','%'.$query.'%')
           ->where('status','=','1')->orderBy('id', 'desc')->paginate(7);
           return view("employee.index",[
                            "employees"   =>  $employees,
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
         $charges=DB::table('charges')->where('status','=','1')->get();
        return view('employee.create',["charges"=>$charges]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeFormRequest $request)
    {
        try {
            $employee = new Employee;
            $employee->status=1;
            $employee->date_register = $request->get('date_register');
            $employee->identification_card = $request->get('identification_card');
            $employee->first_name = $request->get('first_name');
            $employee->second_name = $request->get('second_name');
            $employee->first_last_name = $request->get('first_last_name');
            $employee->second_last_name = $request->get('second_last_name');
            $employee->address = $request->get('address');
            $employee->user = $request->get('user');
            $employee->previleges = $request->get('previleges');
            $employee->charge_id = $request->get('charge_id');
            if ($employee->save()) {
                Alert::success('Success Message','se ha Guardado el Registro')->persistent(3500);
                return redirect('employee');
            }else{
                Alert::warning('Warning Message','ups!! no se pudo Guardar el Registro')->persistent(3500);
                return redierect('employee.create');
            }  
        } catch (Exception $e) {
            Alert::error('error Message','Error al insertar la data Porfavor Verificar los campos vacios')->persistent('close');
             return redirect()->route('employee.create');
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
        return view('employee.show',["employee"=>Employe::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $employee=Employee::findOrFail($id);
         $charge=DB::table('charges')->where('status','=','1')->get();
        return view("employee.edit",["charges"=>$charge]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeFormRequest $request, $id)
    {
         try {
            $employee = Employee::findOrFail($id);
            $employee->status=1;
            $employee->date_register = $request->get('date_register');
            $employee->identification_card = $request->get('identification_card');
            $employee->first_name = $request->get('first_name');
            $employee->second_name = $request->get('second_name');
            $employee->first_last_name = $request->get('first_last_name');
            $employee->second_last_name = $request->get('second_last_name');
            $employee->address = $request->get('address');
            $employee->user = $request->get('user');
            $employee->previleges = $request->get('previleges');
            $employee->charge_id = $request->get('charge_id');
            if ($employee->update()) {
                Alert::success('Success Message','se ha Modificado el Registro')->persistent(3500);
                return redirect('employee');
            }else{
                Alert::warning('Warning Message','ups!! no se pudo Modificado el Registro')->persistent(3500);
                return redierect('employee.create');
            }  
        } catch (Exception $e) {
            Alert::error('error Message','Error al insertar la data Porfavor Verificar los campos vacios')->persistent('close');
             return redirect()->route('employee.create');
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
            $employee=Employee::findOrFail($id);
            $employee->status=0;
            if ($employee->update()) {
                 Alert::success('Success Message','El Registro ha sido Eliminado!!!');
                return redirect('employee');
            }else{
                Alert::warning('Warning Message','No se pudo Eliminar el Registro!!!');
                return redirect('employee.create');
            }
        } catch (Exception $e) {
             Alert::error('Error Message', 'Error en la data insertar Verificar si hay campos vacios')->persistent('close');
           return redirect()->route('employee.create'); 
        }
    }
}
