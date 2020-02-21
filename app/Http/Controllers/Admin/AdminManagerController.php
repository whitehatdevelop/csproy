<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Company;
use App\Manager;

class AdminManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre=$request ->get('nombre');
        
        //busqueda por categoria
        $managers = Manager::where('nombre','like',"%$nombre%")->orderBy('id')->paginate(4);

        $companys = Company::orderBy('razon_social')->get();

        return view('admin.manager.index',compact('managers','companys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companys = Company::orderBy('razon_social')->get();
        return view('admin.manager.create',compact('companys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id'=>'numeric|required|unique:managers,company_id',
            'dni'=>'numeric|required|integer|digits:8|unique:managers,dni',

            'nombre'=>'required|max:255',
            'email'=>'required|email|max:255|unique:managers,email'
            
        ]);

        Manager::create($request->all());

        return redirect()->route('admin.manager.index')->with('datos','Registro creado correctamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($dni)
    {
        $manag= Manager::where('dni',$dni)->firstOrFail();
        $editar = 'Si';

        $companys = Company::orderBy('razon_social')->get();
        
        return view('admin.manager.show',compact('manag','editar','companys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($dni)
    {
        $manag= Manager::where('dni',$dni)->firstOrFail();
        $editar = 'Si';

        $companys = Company::orderBy('razon_social')->get();

        
        return view('admin.manager.edit',compact('manag','editar','companys'));
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
        
        $manag= Manager::findOrFail($id);

        $request->validate([
           
          
            'dni'=>'numeric|required|integer|digits:8|unique:managers,dni,'.$manag->id,

            'nombre'=>'required|max:255',
            'email'=>'required|email|max:255|unique:managers,email,'.$manag->id


            
        ]);
       
        $manag->fill($request->all())->save();

        
        return redirect()->route('admin.manager.index')->with('datos','Registro actualizado correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
