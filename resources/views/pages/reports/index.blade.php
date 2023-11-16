@extends('layouts.app1')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $title }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Reportes</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">

                        <!-- /.card -->

                        <div class="card card-primary card-outline">
                            <form action="{{ route('genReport') }}" method="POST">
                                @csrf
                                <div class="card-body box-profile">
                                    {{-- <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                                </div> --}}

                                    <h3 class="profile-username text-center">Reportes</h3>

                                    {{-- <p class="text-muted text-center">Configuracion</p> --}}

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4">

                                                <div class="form-group">
                                                    <label>Seleccione Reporte</label>
                                                    <select name="report_id" id="company_id" class="form-control"
                                                        style="width: 100%;">
                                                        <option value="1">Reporte Bono Antiguedad</option>
                                                        <option value="2">Reporte Historico</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Seleccione Empresa</label>
                                                    <select name="company_id" id="company_id" class="form-control"
                                                        style="width: 100%;">
                                                        @foreach ($companies as $com)
                                                            <option value="{{ $com->id }}">
                                                                {{ $com->business_name }}

                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label>Seleccione Planilla</label>
                                                    <select name="document_id" id="document_id" class="form-control"
                                                        style="width: 100%;">
                                                        @foreach ($documents as $doc)
                                                            <option value="{{ $doc->id }}">
                                                                {{ $doc->name }}

                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>

                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary btn-block"
                                                        id="btnCheckSheet"><b>Generar</b></button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </form>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>

                </div>
                <!-- /.row -->
                <!-- Main row -->

                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    {{-- @include('pages.users.modal_create') --}}
@endsection



{{-- @include('pages.empresa.scripts') --}}
