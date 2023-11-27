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
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-12">

                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#modal-create">
                                    Añadir
                                </button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOMBRE</th>
                                            {{-- <th>PATH</th> --}}
                                            <th>YEAR</th>
                                            <th>MONTH</th>
                                            <th>EMPRESA</th>
                                            <th>ESTADO</th>
                                            <th>OPCIONES</th>
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
                                            @foreach ($data as $key => $module)
                                                <tr>
                                                    <td>{{ $module->id }}</td>
                                                    <td>{{ $module->name }}</td>
                                                    {{-- <td>{{ $module->path }}</td> --}}
                                                    <td>{{ $module->year }}</td>
                                                    <td>{{ $module->month }}</td>
                                                    <td>{{ App\Models\Company::find($module->company_id)->business_name }}
                                                    </td>
                                                    @if ($module->status == 1)
                                                        <td><span class="badge bg-warning">Pendiente</span></td>
                                                    @elseif ($module->status == 2)
                                                        <td><span class="badge bg-danger">Observado</span></td>
                                                    @elseif ($module->status == 3)
                                                        <td><span class="badge bg-success">No Observado</span></td>
                                                    @endif
                                                    {{-- <td><span class="badge bg-danger">{{ $module->status }}</span></td> --}}
                                                    {{-- <td>{{ $module->status == 1 ? 'Pendiente' : 'Observado' }}</td> --}}
                                                    <td>
                                                        <button type="button" class="btn btn-warning">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" class="btn btn-danger">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </td>
                                                    {{-- <td>{{ $emp->update_all }}</td> --}}
                                                </tr>
                                            @endforeach
                                        @else
                                            no data
                                        @endif

                                        {{-- <tr>
                                            <td>Trident</td>
                                            <td>Internet
                                                Explorer 4.0
                                            </td>
                                            <td>Win 95+</td>
                                            <td> 4</td>
                                            <td>X</td>
                                        </tr> --}}

                                    </tbody>
                                    {{-- <tfoot>
                                    <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>CSS grade</th>
                                    </tr>
                                </tfoot> --}}
                                </table>
                            </div>
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
    @include('pages.documents.modal_create')

    @include('pages.documents.scripts')
@endsection
