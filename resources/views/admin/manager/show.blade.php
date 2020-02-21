@extends('plantilla.admin')


@section('titulo', 'Ver Representante')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.company.index')}}">Representantes</a></li>
<li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')



<div id="apicategory">
    <form >
      @csrf     

      <span style="display:none;" id="editar">{{ $editar }}</span>
      <span style="display:none;" id="nombretemp">{{ $manag->company_id}}</span>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Administración de Representantes</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">

        <div class="form-group">
                           
                           <label for="razon_social">Empresa - Razón Social</label>
                        
                           @foreach($companys as $company)
                           
                            @if ($company['id'] == $manag['company_id'])
                               <input readonly class="form-control"  type="text" value="{{ $company->razon_social}}"></option>
                    
                            @endif
                           @endforeach
                          
       
                               <label for="dni">DNI</label>
                               <input class="form-control" type="text" name="dni" id="dni" value="{{ $manag->dni }} "readonly>
       
                               <label for="nombre">Nombre</label>
                               <input class="form-control" type="text" name="nombre" id="nombre" value="{{ $manag->nombre }} "readonly>
       
                               <label for="email">Email</label>
                               <input class="form-control" type="text" name="email" id="email" value="{{ $manag->email }} "readonly>
                             
                           </div>
                   

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a class="btn btn-danger" href="{{ route('cancelar','admin.manager.index') }}">Cancelar</a>
          
            <a class="btn btn-outline-success float-right" href="{{ route('admin.manager.edit',$manag->dni) }}">Editar</a>
          

            
          
                
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </form>
</div>


 @endsection     