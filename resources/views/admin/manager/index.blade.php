@extends('plantilla.admin')


@section('titulo', 'Administración de Representantes')

@section('breadcrumb')
<li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')



<div id="confirmareliminar" class="row">
  <span style="display:none;" id="urlbase">{{route('admin.manager.index')}}</span>
  @include('custom.modal_eliminar')

    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sección de representantes</h3>

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
                <a class=" m-2 float-right btn btn-primary"  href="{{ route('admin.manager.create') }}">Crear</a>
          <table class="table table-head-fixed">
            <thead>
              <tr>
                <th>ID</th>
                <th>RAZÓN SOCIAL</th>
                <th>DNI</th>
                <th>NOMBRE</th>
                <th>EMAIL</th>

               
                <th colspan="3"></th>
              </tr>
            </thead>
            <tbody>

                @foreach ($managers as $manager)
               
                    <tr>
                        <td> {{$manager->id }} </td>
                          @foreach($companys as $company)
                          @if( $company['id'] == $manager['company_id'] )
                                <td>{{$company->razon_social}}</td> 
                          @endif

                          @endforeach
                        <td> {{$manager->dni }} </td>
                        <td> {{$manager->nombre }} </td>
                        <td> {{$manager->email }} </td> 

                        <td> <a class="btn btn-default"  
                            href="{{ route('admin.manager.show',$manager->dni) }}">Ver</a>
                        </td>

                        <td> <a class="btn btn-info" 
                            href="{{ route('admin.manager.edit',$manager->dni) }}">Editar</a>
                        </td>

                        <td> <a class="btn btn-danger" 
                            href="{{ route('admin.manager.index') }}"
                            v-on:click.prevent="deseas_eliminar({{$manager->id}})" >Eliminar</a>
                        </td>
                        
                    </tr>
                @endforeach
             
              
            </tbody>
          </table>
          {{ $managers->appends($_GET)->links() }}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->



 @endsection     