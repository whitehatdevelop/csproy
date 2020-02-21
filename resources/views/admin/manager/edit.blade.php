@extends('plantilla.admin')


@section('titulo', 'Editar Representante')
@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.manager.index')}}">Representantes</a></li>
<li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('estilos')
 <!-- Select2 -->
<link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  
@endsection

@section('scripts')
<!-- Select2 -->
<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>

<script src="/adminlte/ckeditor/ckeditor.js"></script>

<script>

$(function () {
    //Initialize Select2 Elements
    $('#company_id').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  });

</script>
@endsection

@section('contenido')



<div id="apicategory">
    <form action="{{route('admin.manager.update',$manag->id)}}" method="POST">
      @csrf
      @method('PUT')

      <span style="display:none;" id="editar">{{ $editar }}</span>
      <span style="display:none;" id="nombretemp">{{ $manag->nombre}}</span>
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
                        <input class="form-control" type="text" name="dni" id="dni" value="{{ $manag->dni }} ">

                        <label for="nombre">Nombre</label>
                        <input class="form-control" type="text" name="nombre" id="nombre" value="{{ $manag->nombre }} ">

                        <label for="email">Email</label>
                        <input class="form-control" type="text" name="email" id="email" value="{{ $manag->email }} ">
                      
                    </div>
                   

        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a class="btn btn-danger" href="{{ route('cancelar','admin.manager.index') }}">Cancelar</a>
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