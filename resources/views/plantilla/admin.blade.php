@extends('plantilla.plantilla')


@section('titulo', 'Inicio')



@section('contenido')


 <!-- Small Box (Stat card) -->
 <h5 class="mb-2 mt-4">Panel de Control</h5>
        <div class="row">
          <div class="col-lg-6 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>Módulo de Empresas</h3>

                <p>Gestión de empresas</p>
              </div>
              <div class="icon">
              <i class="fas fa-industry"></i>              </div>
              <a href="{{ route('admin.company.index') }}" class="small-box-footer">
                Ingresar  <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>Módulo de Representantes</h3>

                <p>Gestión de Administradores</p>
              </div>
              <div class="icon">
              <i class="fas fa-user-shield"></i>
              </div>
              <a href="{{ route('admin.manager.index') }}" class="small-box-footer">
                Ingresar  <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

        </div>
        <!-- /.row -->

        @endsection