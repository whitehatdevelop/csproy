<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre=$request ->get('razon_social');
        
        //busqueda por categoria
        $companys = Company::where('razon_social','like',"%$nombre%")->orderBy('razon_social')->paginate(4);
        return view('admin.company.index',compact('companys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
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
            'ruc'=>'numeric|required|integer|digits:11|unique:companies,ruc',
            'razon_social'=>'required|max:255|unique:companies,razon_social',
            'direccion'=>'required|max:255,direccion'
            
        ]);

        Company::create($request->all());

        return redirect()->route('admin.company.index')->with('datos','Registro creado correctamente!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($ruc)
    {
        $comp= Company::where('ruc',$ruc)->firstOrFail();
        $editar = 'Si';
        
        return view('admin.company.show',compact('comp','editar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($ruc)
    {
        $comp= Company::where('ruc',$ruc)->firstOrFail();
        $editar = 'Si';
        
        return view('admin.company.edit',compact('comp','editar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comp= Company::findOrFail($id);

        $request->validate([
           

            'ruc'=>'numeric|required|integer|digits:11|unique:companies,ruc,'.$comp->id,
            'razon_social'=>'required|max:255|unique:companies,razon_social,'.$comp->id,
            'direccion'=>'required|max:255,direccion'
            
        ]);
       
        $comp->fill($request->all())->save();

        
        return redirect()->route('admin.company.index')->with('datos','Registro actualizado correctamente!');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
