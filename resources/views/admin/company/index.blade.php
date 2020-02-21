@extends('plantilla.plantilla')


@section('titulo', 'Administración de Empresas')

@section('breadcrumb')
<li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')



<div id="confirmareliminar" class="row">
  <span style="display:none;" id="urlbase">{{route('admin.company.index')}}</span>
  @include('custom.modal_eliminar')

    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sección de empresas</h3>

          <div class="card-tools">

            <form>
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="nombre" class="form-control float-right" placeholder="Buscar" value="{{request()->get('nombre')}}">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
              </div>
            </div>
            </form>

          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
                <a class=" m-2 float-right btn btn-primary"  href="{{ route('admin.company.create') }}">Crear</a>
          <table class="table table-head-fixed">
            <thead>
              <tr>
                <th>ID</th>
                <th>RUC</th>
                <th>RAZÓN SOCIAL</th>
                <th>DIRECCIÓN</th>
               
                <th colspan="3"></th>
              </tr>
            </thead>
            <tbody>

                @foreach ($companys as $company)
               
                    <tr>
                        <td> {{$company->id }} </td>
                        <td> {{$company->ruc }} </td>
                        <td> {{$company->razon_social }} </td>
                        <td> {{$company->direccion }} </td>
                        
                        <td> <a class="btn btn-default"  
                            href="{{ route('admin.company.show',$company->ruc) }}">Ver</a>
                        </td>

                        <td> <a class="btn btn-info" 
                            href="{{ route('admin.company.edit',$company->ruc) }}">Editar</a>
                        </td>

                        <td> <a class="btn btn-danger" 
                            href="{{ route('admin.company.index') }}"
                            v-on:click.prevent="deseas_eliminar({{$company->id}})" >Eliminar</a>
                        </td>
                        
                    </tr>
                @endforeach
             
              
            </tbody>
          </table>
          {{ $companys->appends($_GET)->links() }}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->



 @endsection     