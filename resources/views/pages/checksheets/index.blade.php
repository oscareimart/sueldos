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
                            <li class="breadcrumb-item"><a href="#">Usuarios y Roles</a></li>
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
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                {{-- <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                                </div> --}}

                                <h3 class="profile-username text-center">Parametros de Verificacion</h3>

                                <p class="text-muted text-center">Configuracion</p>

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Seleccione Empresa</label>
                                                <select name="company_id" id="company_id" class="form-control select2bs4"
                                                    style="width: 100%;">
                                                    @foreach ($companies as $comp)
                                                        <option value="{{ $comp->id }}">
                                                            {{ $comp->business_name }}

                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Seleccione Planilla</label>
                                                <select name="document_id" id="document_id" class="form-control select2bs4"
                                                    style="width: 100%;">
                                                    @foreach ($documents as $doc)
                                                        <option value="{{ $doc->id }}">
                                                            {{ $doc->name }}

                                                        </option>
                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a href="#" class="btn btn-primary btn-block"><b>Verificar</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#sheetCsvTab"
                                            data-toggle="tab">PLanilla Excel</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#sheetSysTab" data-toggle="tab">PLanilla
                                            Sistema</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#sheetResultTab"
                                            data-toggle="tab">Resultado</a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="active tab-pane" id="sheetCsvTab">
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>NRO</th>
                                                        <th>EMPLEADO</th>
                                                        <th>CI</th>
                                                        <th>EXT</th>
                                                        <th>NACIONALIDAD</th>
                                                        <th>SALARIO</th>
                                                        <th>HORAS EXTRAS</th>
                                                        <th>TOTAL HORAS EXTRAS</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (session('success'))
                                                        <div class="alert alert-success alert-dismissible">
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                aria-hidden="true">&times;</button>
                                                            <h5><i class="icon fas fa-check"></i>Creacion Correcta!</h5>
                                                            {{ session('success') }}
                                                        </div>
                                                    @endif
                                                    @if ($errors->any())
                                                        <div class="alert alert-danger alert-dismissible">
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                aria-hidden="true">&times;</button>
                                                            <h5><i class="icon fas fa-check"></i>Error al Registrar</h5>
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    {{-- {{ $data[0] }} --}}
                                                    @if ($documentCsv)
                                                        @foreach ($documentCsv as $key => $emp)
                                                            <tr>

                                                                <td>{{ $key + 1 }}</td>
                                                                <td>{{ $emp->nombre }}</td>
                                                                <td>{{ $emp->ci }}</td>
                                                                <td>{{ $emp->extension }}</td>
                                                                <td>{{ $emp->nacionalidad }}</td>
                                                                <td>{{ $emp->HBE }}</td>
                                                                <td>{{ $emp->HE }}</td>
                                                                <td>{{ $emp->IHE }}</td>
                                                                {{-- <td>{{ $emp->totalHE }}</td> --}}
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        no data
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="sheetSysTab">
                                        <!-- The timeline -->
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>EMPLEADO</th>
                                                        <th>CI</th>
                                                        <th>EXT</th>
                                                        <th>NACIONALIDAD</th>
                                                        <th>SALARIO</th>
                                                        <th>HORAS EXTRAS</th>
                                                        <th>TOTAL HORAS EXTRAS</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (session('success'))
                                                        <div class="alert alert-success alert-dismissible">
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                aria-hidden="true">&times;</button>
                                                            <h5><i class="icon fas fa-check"></i>Creacion Correcta!</h5>
                                                            {{ session('success') }}
                                                        </div>
                                                    @endif
                                                    @if ($errors->any())
                                                        <div class="alert alert-danger alert-dismissible">
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                aria-hidden="true">&times;</button>
                                                            <h5><i class="icon fas fa-check"></i>Error al Registrar</h5>
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                    {{-- {{ $data[0] }} --}}
                                                    @if ($data)
                                                        @foreach ($data as $key => $emp)
                                                            <tr>

                                                                <td>{{ $emp->id }}</td>
                                                                <td>{{ $emp->name }}</td>
                                                                <td>{{ $emp->document }}</td>
                                                                <td>{{ $emp->extension }}</td>
                                                                <td>{{ $emp->nationality }}</td>
                                                                <td>{{ $emp->salary }}</td>
                                                                <td>{{ $emp->HE }}</td>
                                                                <td>{{ $emp->totalHE }}</td>
                                                            </tr>
                                                        @endforeach
                                                    @else
                                                        no data
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class="tab-pane" id="sheetResultTab">
                                        <div class="card">
                                            <div class="card-header">
                                                <h3 class="card-title">
                                                    <i class="fas fa-text-width"></i>
                                                    Detalle de Observaciones
                                                </h3>
                                            </div>
                                            <!-- /.card-header -->
                                            <div class="card-body">
                                                <ol>
                                                    @foreach ($errorsSheet as $es)
                                                        <li class="text-danger">{{ $es }}
                                                            <a href="#" class="toastsDefaultWarning">Ver
                                                                Normativa</a>
                                                            {{-- <button
                                                            type="button" class="btn btn-warning toastsDefaultWarning">
                                                            Launch Warning Toast
                                                        </button> --}}
                                                        </li>
                                                    @endforeach
                                                    {{-- <li>Bono Horas extras Observado, Empleado: xxx, <a
                                                            href="https://pdfobject.com/pdf/sample.pdf" target="_blank">Ver
                                                            Normativa</a></li>
                                                    <li>Bono Domingos Trabajados Observado, Empleado: xxx</li> --}}
                                                </ol>
                                            </div>
                                            <!-- /.card-body -->
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    {{-- @include('pages.bonus.modal_create') --}}
@endsection
{{--
@include('pages.bonus.scripts') --}}
