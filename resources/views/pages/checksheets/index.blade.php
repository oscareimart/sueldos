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
                    <div class="col-md-12">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <form action="{{ route('loadData') }}" method="POST">
                                @csrf
                                <div class="card-body box-profile">
                                    {{-- <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
                                </div> --}}

                                    <h3 class="profile-username text-center">Parametros de Verificacion</h3>

                                    <p class="text-muted text-center">Configuracion</p>

                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-5">

                                                <div class="form-group">
                                                    <label>Seleccione Empresa</label>
                                                    <select name="company_id" id="company_id"
                                                        class="form-control select2bs4" style="width: 100%;">
                                                        @foreach ($companies as $comp)
                                                            <option value="{{ $comp->id }}">
                                                                {{ $comp->business_name }}

                                                            </option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label>Seleccione Planilla</label>
                                                    <select name="document_id" id="document_id"
                                                        class="form-control select2bs4" style="width: 100%;">
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
                                                        id="btnCheckSheet"><b>Verificar</b></button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </form>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-md-12">
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
                                            <table id="dataTableScv" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        {{-- <th>NRO</th> --}}
                                                        <th>EMPLEADO</th>
                                                        <th>CI</th>
                                                        {{-- <th>EXT</th> --}}
                                                        {{-- <th>NACIONALIDAD</th> --}}
                                                        <th>SALARIO</th>
                                                        <th>HORAS EXTRAS</th>
                                                        <th>TOTAL HORAS EXTRAS</th>
                                                        <th>HORAS RECARGO NOC</th>
                                                        <th>TOTAL RECARGO NOC</th>
                                                        <th>DOMINGOS TRABAJADOS</th>
                                                        <th>TOTAL DOMINGOS TRAB</th>
                                                        <th>TOTAL BONO ANTIGUEDAD</th>
                                                        <th>TOTAL GANADO</th>
                                                        <th>AFP</th>
                                                        <th>TOTAL DESCUENTO</th>
                                                        <th>LIQUIDO PAGABLE</th>

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
                                                    @if (isset($documentCsv))
                                                        @foreach ($documentCsv as $key => $emp)
                                                            <tr>

                                                                {{-- <td>{{ $key + 1 }}</td> --}}
                                                                <td>{{ $emp->nombre }}</td>
                                                                <td>{{ $emp->ci . $emp->extension }}</td>
                                                                {{-- <td>{{ $emp->extension }}</td> --}}
                                                                {{-- <td>{{ $emp->nacionalidad }}</td> --}}
                                                                <td>{{ $emp->HBE }}</td>
                                                                <td>{{ $emp->HE }}</td>
                                                                <td>{{ $emp->BHE }}</td>
                                                                <td>{{ $emp->HRN }}</td>
                                                                <td>{{ $emp->BRN }}</td>
                                                                <td>{{ $emp->DT }}</td>
                                                                <td>{{ $emp->BDT }}</td>
                                                                <td>{{ $emp->BA }}</td>
                                                                <td>{{ $emp->TG }}</td>
                                                                <td>{{ $emp->DAFP }}</td>
                                                                <td>{{ $emp->TD }}</td>
                                                                <td>{{ $emp->LP }}</td>
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
                                            <table id="dataTableSys" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        {{-- <th>ID</th> --}}
                                                        <th>EMPLEADO</th>
                                                        <th>CI</th>
                                                        <th>F INGRESO</th>
                                                        <th>F NAC</th>
                                                        {{-- <th>EXT</th> --}}
                                                        {{-- <th>NACIONALIDAD</th> --}}
                                                        {{-- <th>SALARIO</th> --}}
                                                        @if (isset($data[0]->HE))
                                                            <th>HRS EXT</th>
                                                        @endif

                                                        @if (isset($data[0]->BHE))
                                                            <th>TOT HRS EXT</th>
                                                        @endif

                                                        @if (isset($data[0]->HRN))
                                                            <th>HRS REC NOC</th>
                                                        @endif

                                                        @if (isset($data[0]->BRN))
                                                            <th>TOT REC NOC</th>
                                                        @endif
                                                        @if (isset($data[0]->DT))
                                                            <th>DOM TRAB</th>
                                                        @endif
                                                        @if (isset($data[0]->BDT))
                                                            <th>TOT DOM TRAB</th>
                                                        @endif
                                                        {{-- @if (isset($data[0]->AT))
                                                            <th>AÑOS ANTIGUEDAD</th>
                                                        @endif
                                                        @if (isset($data[0]->RS))
                                                            <th>RANGO SALARIAL</th>
                                                        @endif --}}

                                                        @if (isset($data[0]->BA))
                                                            <th>BONO ANT</th>
                                                        @endif

                                                        @if (isset($data[0]->TG))
                                                            <th>TOT GANADO</th>
                                                        @endif

                                                        @if (isset($data[0]->DAFP))
                                                            <th>AFP</th>
                                                        @endif

                                                        @if (isset($data[0]->DANS))
                                                            <th>ANS</th>
                                                        @endif

                                                        @if (isset($data[0]->TD))
                                                            <th>TOT DESC</th>
                                                        @endif

                                                        @if (isset($data[0]->LP))
                                                            <th>LIQ PAG</th>
                                                        @endif


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- {{ $data[0] }} --}}
                                                    @if (isset($data))
                                                        @foreach ($data as $key => $emp)
                                                            <tr>

                                                                {{-- <td>{{ $emp->id }}</td> --}}
                                                                <td>{{ $emp->name }}</td>
                                                                <td>{{ $emp->document . $emp->extension }}</td>
                                                                <td>{{ $emp->admission_date }}</td>
                                                                <td>{{ $emp->birthdate }}</td>
                                                                {{-- <td>{{ $emp->extension }}</td> --}}
                                                                {{-- <td>{{ $emp->nationality }}</td> --}}
                                                                {{-- <td>{{ $emp->salary }}</td> --}}
                                                                @if (isset($emp->HE))
                                                                    <td>{{ $emp->HE }}</td>
                                                                @endif

                                                                @if (isset($emp->BHE))
                                                                    <td>{{ $emp->BHE }}</td>
                                                                @endif

                                                                @if (isset($emp->HRN))
                                                                    <td>{{ $emp->HRN }}</td>
                                                                @endif

                                                                @if (isset($emp->BRN))
                                                                    <td>{{ $emp->BRN }}</td>
                                                                @endif
                                                                @if (isset($emp->DT))
                                                                    <td>{{ $emp->DT }}</td>
                                                                @endif

                                                                @if (isset($emp->BDT))
                                                                    <td>{{ $emp->BDT }}</td>
                                                                @endif
                                                                {{-- @if (isset($emp->AT))
                                                                    <td>{{ $emp->AT }}</td>
                                                                @endif
                                                                @if (isset($emp->RS))
                                                                    <td>{{ $emp->RS }}</td>
                                                                @endif --}}
                                                                @if (isset($emp->BA))
                                                                    <td>{{ $emp->BA }}</td>
                                                                @endif

                                                                @if (isset($emp->TG))
                                                                    <td>{{ $emp->TG }}</td>
                                                                @endif

                                                                @if (isset($emp->DAFP))
                                                                    <td>{{ $emp->DAFP }}</td>
                                                                @endif

                                                                @if (isset($emp->DANS))
                                                                    <td>{{ $emp->DANS }}</td>
                                                                @endif

                                                                @if (isset($emp->TD))
                                                                    <td>{{ $emp->TD }}</td>
                                                                @endif
                                                                @if (isset($emp->LP))
                                                                    <td>{{ $emp->LP }}</td>
                                                                @endif

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
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <h3 class="card-title">
                                                            <i class="fas fa-text-width"></i>
                                                            Detalle de Observaciones
                                                        </h3>
                                                    </div>
                                                    <div class="col-md-2">
                                                        {{-- <form action="{{ route('generatePDF') }}" method="POST">
                                                            @csrf
                                                            <input type="text" name="jsonReport" id="txtJsonReport"> --}}
                                                        <button type="button" id="btnReport"
                                                            class="btn btn-primary btn-block">
                                                            Generar Reporte
                                                        </button>
                                                        {{-- </form> --}}

                                                    </div>
                                                </div>



                                            </div>
                                            <!-- /.card-header -->
                                            {{-- <div class="card-body"> --}}
                                            {{-- <ol>
                                                    @foreach ($errorsSheet as $es)
                                                        <li class="text-danger">{{ $es }}
                                                            <a href="#" class="toastsDefaultWarning">Ver
                                                                Normativa</a> --}}
                                            {{-- <button
                                                            type="button" class="btn btn-warning toastsDefaultWarning">
                                                            Launch Warning Toast
                                                        </button> --}}
                                            {{-- </li>
                                                    @endforeach --}}
                                            {{-- <li>Bono Horas extras Observado, Empleado: xxx, <a
                                                            href="https://pdfobject.com/pdf/sample.pdf" target="_blank">Ver
                                                            Normativa</a></li>
                                                    <li>Bono Domingos Trabajados Observado, Empleado: xxx</li> --}}
                                            {{-- </ol> --}}
                                            {{-- </div> --}}
                                            <div class="card-body">
                                                <table id="example1" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Nro</th>
                                                            <th>Detalle</th>
                                                            <th>Normativa</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if (isset($errorsSheet))
                                                            @foreach ($errorsSheet as $key => $es)
                                                                <tr>
                                                                    <td>{{ $key + 1 }}</td>
                                                                    <td>{{ $es['obs'] }}</td>
                                                                    <td><a href="http://www.silep.gob.bo/norma/4204/texto_ordenado"
                                                                            target="_blank"
                                                                            class="toastsDefaultWarning">Ver
                                                                            Normativa</a></td>
                                                                    {{-- <td>Internet
                                                                Explorer 4.0
                                                            </td>
                                                            <td>Win 95+</td>
                                                            <td> 4</td>
                                                            <td>X</td> --}}
                                                                </tr>
                                                            @endforeach
                                                        @else
                                                            no data
                                                        @endif
                                                    </tbody>
                                                </table>
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
