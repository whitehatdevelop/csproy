@extends('plantilla.admin')


@section('titulo', 'Editar Empresa')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.company.index')}}">Empresas</a></li>
<li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')



<div id="apicategory">
    <form action="{{route('admin.company.update',$comp->id)}}" method="POST">
      @csrf
      @method('PUT')

      <span style="display:none;" id="editar">{{ $editar }}</span>
      <span style="display:none;" id="nombretemp">{{ $comp->razon_social}}</span>
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
                        <input class="form-control" type="text" name="ruc" id="ruc" value="{{ $comp->ruc }} ">

                        <label for="razon_social">Razón Social</label>
                        <input class="form-control" type="text" name="razon_social" id="razon_social" value="{{ $comp->razon_social }} ">

                        <label for="direccion">Dirección</label>
                        <input class="form-control" type="text" name="direccion" id="direccion" value="{{ $comp->direccion }} ">
                        
                        <!--<br v-if="div_aparecer">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="5">  {{ $comp->descripcion }}  </textarea>-->
                        
                    </div>
                   

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a class="btn btn-danger" href="{{ route('cancelar','admin.company.index') }}">Cancelar</a>
                    <input 
                    :disabled = "deshabilitar_boton==1"
                  type="submit" value="Guardar" class="btn btn-primary float-right">
          
                
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </form>
</div>


 @endsection     