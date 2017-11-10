<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CategoryFormRequest;
use SistemaFarmacia\App\Http\Requests;
use App\Http\Controllers\Session;
use DB;
use Exception;
use Alert; 

class CategoryController extends Controller
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
        if ($request) {
           $query=trim($request->get('searchText'));
           $categories=DB::table('categories')
           ->where('name','LIKE','%'.$query.'%')
           ->where('status','=','1')->orderBy('id','desc')->paginate(7);
           return view("category.index",["categories"=>$categories,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $request)
    {
        try {
            $category = new Category;
            $category->status=1;
            $category->name = $request->get('name');
            $category->description = $request->get('description');
            if($category->save()){
                Alert::success('Success Message','se ha Guardado el Registro')->persistent('close');
                return Redirect('category');
            }else{
                Alert::warning('Warning Message','Error al Guardar el Registro')->persistent(3500);
            }
            
        } catch (Exception $e) {
             Alert::error('Error Message', 'Error en la data insertar Verificar si hay campos vacios')->persistent('close');
           return redirect()->route('category.create');            
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view("category.show",["category"=>Category::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("category.edit",["category"=>Category::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryFormRequest $request, $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->name=$request->get('name');
            $category->description=$request->get('description');
            if($category->update()){
                Alert::success('Success Message','El Registro ha sido Modificado!!!');
                return redirect('category');
            }else{
                Alert::warning('Warning Message','No se pudo Modificar el Registro!!!');
                return redirect('category.create');
            }

        } catch (Exception $e) {
              Alert::error('Error Message', 'Error en la data insertar Verificar si hay campos vacios')->persistent('close');
           return redirect()->route('category.create');  
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->status=0;
            if ($category->update()) {
           Alert::success('Success Message','El Registro ha sido Eliminado!!!');
                return redirect('category');
            }else{
                Alert::warning('Warning Message','No se pudo Eliminar el Registro!!!');
                return redirect('category.create');
            }
        } catch (Exception $e) {
             Alert::error('Error Message', 'Error en la data insertar Verificar si hay campos vacios')->persistent('close');
           return redirect()->route('category.create'); 
        }
    }
}
