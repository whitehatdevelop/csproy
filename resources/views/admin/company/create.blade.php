@extends('plantilla.admin')


@section('titulo', 'Agregar Empresa')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.company.index')}}">Empresas</a></li>
<li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')



<div id="apicategory">
    <form action="{{ route('admin.company.store') }}" method="POST">
      @csrf

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Administración de Empresas</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
              
                
                    
                    <div class="form-group">
                        <label for="ruc">RUC</label>
                        <input class="form-control" type="number" name="ruc" id="ruc">

                        <label for="razon_social">Razón Social</label>
                        <input class="form-control" type="text" name="razon_social" id="razon_social">

                        <label for="direccion">Dirección</label>
                        <input class="form-control" type="text" name="direccion" id="direccion">

                       <!-- <label for="descripcion">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="5"></textarea> -->
                        
                    </div>
                   

        </div>
        <!-- /.card-body -->
        <div class="card-footer">

          <a class="btn btn-danger" href="{{ route('cancelar','admin.company.index') }}">Cancelar</a>


                    <input type="submit" value="Guardar" class="btn btn-primary float-right">
          
                
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </form>
</div>


 @endsection     