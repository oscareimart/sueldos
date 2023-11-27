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
                            <li class="breadcrumb-item"><a href="#">Planillas</a></li>
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
                                                    <select name="company_id" id="companies" class="form-control select2bs4"
                                                        style="width: 100%;">
                                                        <option selected disabled>Seleccione...</option>
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
                                                    <select name="document_id" id="documents"
                                                        class="form-control select2bs4" style="width: 100%;">
                                                        {{-- @foreach ($documents as $doc)
                                                            <option value="{{ $doc->id }}"
                                                                data-parent="{{ $doc->company_id }}">
                                                                {{ $doc->name }}

                                                            </option>
                                                        @endforeach --}}

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
                                            data-toggle="tab">Planilla Excel</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#sheetSysTab" data-toggle="tab">Planilla
                                            Sueldos</a>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="#sheetSysTab_" data-toggle="tab">Planilla
                                            Tributaria</a>
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
                                                    <tr class="bg-fields">
                                                        {{-- <th>NRO</th> --}}
                                                        <th>EMPLEADO</th>
                                                        <th>CI</th>
                                                        <th>INGRESO</th>
                                                        <th>NACIMIENTO</th>
                                                        <th>HABER BASICO</th>
                                                        @if (isset($documentCsv[0]->BA))
                                                            <th>BONO ANT</th>
                                                        @endif

                                                        @if (isset($documentCsv[0]->HRN))
                                                            <th>HRS REC NOC</th>
                                                        @endif

                                                        @if (isset($documentCsv[0]->BRN))
                                                            <th>TOT REC NOC</th>
                                                        @endif

                                                        @if (isset($documentCsv[0]->HE))
                                                            <th>HRS EXT</th>
                                                        @endif

                                                        @if (isset($documentCsv[0]->BHE))
                                                            <th>TOT HRS EXT</th>
                                                        @endif




                                                        @if (isset($documentCsv[0]->DT))
                                                            <th>DOM TRAB</th>
                                                        @endif
                                                        @if (isset($documentCsv[0]->BDT))
                                                            <th>TOT DOM TRAB</th>
                                                        @endif
                                                        {{-- @if (isset($documentCsv[0]->AT))
                                                            <th>AÑOS ANTIGUEDAD</th>
                                                        @endif
                                                        @if (isset($documentCsv[0]->RS))
                                                            <th>RANGO SALARIAL</th>
                                                        @endif --}}



                                                        @if (isset($documentCsv[0]->TG))
                                                            <th>TOT GANADO</th>
                                                        @endif

                                                        @if (isset($documentCsv[0]->DAFP))
                                                            <th>AFP</th>
                                                        @endif

                                                        @if (isset($documentCsv[0]->DANS))
                                                            <th>ANS</th>
                                                        @endif

                                                        @if (isset($documentCsv[0]->DJ))
                                                            <th>DJ</th>
                                                        @endif

                                                        @if (isset($documentCsv[0]->TD))
                                                            <th>TOT DESC</th>
                                                        @endif

                                                        @if (isset($documentCsv[0]->LP))
                                                            <th>LIQ PAG</th>
                                                        @endif
                                                        {{-- <th>EXT</th> --}}
                                                        {{-- <th>NACIONALIDAD</th> --}}
                                                        {{-- <th>HABER BASICO</th>
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
                                                        <th>LIQUIDO PAGABLE</th> --}}

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $totalHBE_ = 0;
                                                        $totalBA_ = 0;
                                                        $totalBRN_ = 0;
                                                        $totalBHE_ = 0;
                                                        $totalBDT_ = 0;
                                                        $totalTG_ = 0;
                                                        $totalDAFP_ = 0;
                                                        $totalDANS_ = 0;
                                                        $totalDJ_ = 0;
                                                        $totalTD_ = 0;
                                                        $totalLP_ = 0;
                                                    @endphp

                                                    {{-- {{ $data[0] }} --}}
                                                    @if (isset($documentCsv))
                                                        @foreach ($documentCsv as $key => $e)
                                                            <tr>
                                                                <td>{{ $e->nombre }}</td>
                                                                <td>{{ $e->ci . $e->extension }}</td>
                                                                <td>{{ $e->FI }}</td>
                                                                {{-- <td>{{ $e->extension }}</td> --}}
                                                                {{-- <td>{{ $e->nacionalidad }}</td> --}}
                                                                <td>{{ $e->fNacimiento }}</td>
                                                                <td class="bg-green-1 f-currency">{{ $e->HBE }}</td>
                                                                <td class="bg-green-1 f-currency">{{ $e->BA }}</td>
                                                                <td class="bg-green-1">{{ $e->HRN }}</td>
                                                                <td class="bg-green-1 f-currency">{{ $e->BRN }}</td>
                                                                <td class="bg-green-1">{{ $e->HE }}</td>
                                                                <td class="bg-green-1 f-currency">{{ $e->BHE }}</td>
                                                                <td class="bg-green-1">{{ $e->DT }}</td>
                                                                <td class="bg-green-1 f-currency">{{ $e->BDT }}</td>
                                                                <td class="bg-green-2 f-currency">{{ $e->TG }}</td>
                                                                <td class="bg-orange-1 f-currency">{{ $e->DAFP }}</td>
                                                                <td class="bg-orange-1 f-currency">{{ $e->DANS }}</td>
                                                                <td class="bg-orange-1 f-currency">{{ $e->DJ }}</td>
                                                                <td class="bg-orange-2 f-currency">{{ $e->TD }}</td>
                                                                <td class="bg-green-3 f-currency">{{ $e->LP }}</td>
                                                                {{-- <td>{{ $e->totalHE }}</td> --}}
                                                            </tr>
                                                            @php
                                                                $totalHBE_ += floatval(str_replace(',', '.', $e->HBE)); //$e->HBE;
                                                                $totalBA_ += floatval(str_replace(',', '.', $e->BA));
                                                                $totalBRN_ += floatval(str_replace(',', '.', $e->BRN));
                                                                $totalBHE_ += floatval(str_replace(',', '.', $e->BHE));
                                                                $totalBDT_ += floatval(str_replace(',', '.', $e->BDT));
                                                                $totalTG_ += floatval(str_replace(',', '.', $e->TG));
                                                                $totalDAFP_ += floatval(str_replace(',', '.', $e->DAFP));
                                                                $totalDANS_ += floatval(str_replace(',', '.', $e->DANS));
                                                                $totalDJ_ += floatval(str_replace(',', '.', $e->DJ));
                                                                $totalTD_ += floatval(str_replace(',', '.', $e->TD));
                                                                $totalLP_ += floatval(str_replace(',', '.', $e->LP));
                                                            @endphp
                                                        @endforeach
                                                    @else
                                                        no data
                                                    @endif
                                                </tbody>
                                                <tfoot>
                                                    <tr class="bg-totals">
                                                        <td colspan="4">Totales:</td>
                                                        <td class="f-currency"><strong>{{ $totalHBE_ }}</strong></td>
                                                        <td class="f-currency"><strong>{{ $totalBA_ }}</strong></td>
                                                        <td></td>
                                                        <td class="f-currency"><strong>{{ $totalBRN_ }}</strong></td>
                                                        <td></td>
                                                        <td class="f-currency"><strong>{{ $totalBHE_ }}</strong></td>
                                                        <td></td>
                                                        <td class="f-currency"><strong>{{ $totalBDT_ }}</strong></td>
                                                        <td class="f-currency"><strong>{{ $totalTG_ }}</strong></td>
                                                        <td class="f-currency"><strong>{{ $totalDAFP_ }}</strong></td>
                                                        <td class="f-currency"><strong>{{ $totalDANS_ }}</strong></td>
                                                        <td class="f-currency"><strong>{{ $totalDJ_ }}</strong></td>
                                                        <td class="f-currency"><strong>{{ $totalTD_ }}</strong></td>
                                                        <td class="f-currency"><strong>{{ $totalLP_ }}</strong></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="sheetSysTab">
                                        <!-- The timeline -->
                                        <div class="card-body">
                                            <table id="dataTableSys" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr class="bg-fields">
                                                        {{-- <th>ID</th> --}}
                                                        <th>EMPLEADO</th>
                                                        <th>CI</th>
                                                        <th>INGRESO</th>
                                                        <th>NACIMIENTO</th>

                                                        {{-- <th>EXT</th> --}}
                                                        {{-- <th>NACIONALIDAD</th> --}}
                                                        {{-- <th>SALARIO</th> --}}


                                                        <th>HABER BASICO</th>

                                                        @if (isset($data[0]->BA))
                                                            <th>BONO ANT</th>
                                                        @endif

                                                        @if (isset($data[0]->HRN))
                                                            <th>HRS REC NOC</th>
                                                        @endif

                                                        @if (isset($data[0]->BRN))
                                                            <th>TOT REC NOC</th>
                                                        @endif

                                                        @if (isset($data[0]->HE))
                                                            <th>HRS EXT</th>
                                                        @endif

                                                        @if (isset($data[0]->BHE))
                                                            <th>TOT HRS EXT</th>
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



                                                        @if (isset($data[0]->TG))
                                                            <th>TOT GANADO</th>
                                                        @endif

                                                        @if (isset($data[0]->DAFP))
                                                            <th>AFP</th>
                                                        @endif

                                                        @if (isset($data[0]->DANS))
                                                            <th>ANS</th>
                                                        @endif

                                                        @if (isset($data[0]->DJ))
                                                            <th>DJ</th>
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
                                                    @php
                                                        $totalHBE = 0;
                                                        $totalBA = 0;
                                                        $totalBRN = 0;
                                                        $totalBHE = 0;
                                                        $totalBDT = 0;
                                                        $totalTG = 0;
                                                        $totalDAFP = 0;
                                                        $totalDANS = 0;
                                                        $totalDJ = 0;
                                                        $totalTD = 0;
                                                        $totalLP = 0;
                                                    @endphp
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


                                                                <td class="bg-green-1 f-currency">{{ $emp->HBE }}</td>

                                                                @if (isset($emp->BA))
                                                                    {{-- @dump($emp->BA, floatval(str_replace(',', '.', $documentCsv[$key]->BA)), $documentCsv[$key]->BA) --}}
                                                                    @if ($emp->BA != floatval(str_replace(',', '.', $documentCsv[$key]->BA)))
                                                                        <td class="bg-check f-currency">
                                                                            {{ $emp->BA }}
                                                                        </td>
                                                                    @else
                                                                        <td class="bg-green-1 f-currency">
                                                                            {{ $emp->BA }}
                                                                        </td>
                                                                    @endif
                                                                @endif

                                                                @if (isset($emp->HRN))
                                                                    <td class="bg-green-1">{{ $emp->HRN }}
                                                                    </td>
                                                                @endif

                                                                @if (isset($emp->BRN))
                                                                    @if ($emp->BRN != floatval(str_replace(',', '.', $documentCsv[$key]->BRN)))
                                                                        <td class="bg-check f-currency">
                                                                            {{ $emp->BRN }}
                                                                        </td>
                                                                    @else
                                                                        <td class="bg-green-1 f-currency">
                                                                            {{ $emp->BRN }}
                                                                        </td>
                                                                    @endif
                                                                @endif

                                                                @if (isset($emp->HE))
                                                                    <td class="bg-green-1">{{ $emp->HE }}
                                                                    </td>
                                                                @endif

                                                                @if (isset($emp->BHE))
                                                                    @if ($emp->BRN != floatval(str_replace(',', '.', $documentCsv[$key]->BHE)))
                                                                        <td class="bg-check f-currency">
                                                                            {{ $emp->BHE }}
                                                                        </td>
                                                                    @else
                                                                        <td class="bg-green-1 f-currency">
                                                                            {{ $emp->BHE }}
                                                                        </td>
                                                                    @endif
                                                                @endif




                                                                @if (isset($emp->DT))
                                                                    <td class="bg-green-1">{{ $emp->DT }}
                                                                    </td>
                                                                @endif

                                                                @if (isset($emp->BDT))
                                                                    @if ($emp->BDT != floatval(str_replace(',', '.', $documentCsv[$key]->BDT)))
                                                                        <td class="bg-check f-currency">
                                                                            {{ $emp->BDT }}
                                                                        </td>
                                                                    @else
                                                                        <td class="bg-green-1 f-currency">
                                                                            {{ $emp->BDT }}
                                                                        </td>
                                                                    @endif
                                                                    {{-- <td class="bg-green-1 f-currency">{{ $emp->BDT }} --}}
                                                                    {{-- </td> --}}
                                                                @endif
                                                                {{-- @if (isset($emp->AT))
                                                                    <td class="bg-green-1">{{ $emp->AT }}</td>
                                                                @endif
                                                                @if (isset($emp->RS))
                                                                    <td class="bg-green-1">{{ $emp->RS }}</td>
                                                                @endif --}}


                                                                @if (isset($emp->TG))
                                                                    @if ($emp->TG > 10824)
                                                                        <td class="bg-blue-1 f-currency">
                                                                            <strong>{{ $emp->TG }}</strong>
                                                                        </td>
                                                                    @else
                                                                        <td class="bg-green-2 f-currency">
                                                                            <strong>{{ $emp->TG }}</strong>
                                                                        </td>
                                                                    @endif
                                                                    {{-- <td class="bg-green-2 f-currency">
                                                                        <strong>{{ $emp->TG }}</strong>
                                                                    </td> --}}
                                                                @endif

                                                                @if (isset($emp->DAFP))
                                                                    @if ($emp->DAFP != floatval(str_replace(',', '.', $documentCsv[$key]->DAFP)))
                                                                        <td class="bg-check f-currency">
                                                                            {{ $emp->DAFP }}
                                                                        </td>
                                                                    @else
                                                                        <td class="bg-orange-1 f-currency">
                                                                            {{ $emp->DAFP }}
                                                                        </td>
                                                                    @endif
                                                                    {{-- <td class="bg-orange-1 f-currency">{{ $emp->DAFP }}
                                                                    </td> --}}
                                                                @endif

                                                                @if (isset($emp->DANS))
                                                                    @if ($emp->DANS != floatval(str_replace(',', '.', $documentCsv[$key]->DANS)))
                                                                        <td class="bg-check f-currency">
                                                                            {{ $emp->DANS }}
                                                                        </td>
                                                                    @else
                                                                        <td class="bg-orange-1 f-currency">
                                                                            {{ $emp->DANS }}
                                                                        </td>
                                                                    @endif
                                                                    {{-- <td class="bg-orange-1 f-currency">{{ $emp->DANS }}
                                                                    </td> --}}
                                                                @endif

                                                                @if (isset($emp->DJ))
                                                                    @if ($emp->DJ != floatval(str_replace(',', '.', $documentCsv[$key]->DJ)))
                                                                        <td class="bg-check f-currency">
                                                                            {{ $emp->DJ }}
                                                                        </td>
                                                                    @else
                                                                        <td class="bg-orange-1 f-currency">
                                                                            {{ $emp->DJ }}
                                                                        </td>
                                                                    @endif
                                                                    {{-- <td class="bg-orange-1 f-currency">{{ $emp->DJ }}
                                                                    </td> --}}
                                                                @endif

                                                                @if (isset($emp->TD))
                                                                    <td class="bg-orange-2 f-currency">
                                                                        <strong>{{ $emp->TD }}</strong>
                                                                    </td>
                                                                @endif
                                                                @if (isset($emp->LP))
                                                                    <td class="bg-green-3 f-currency">
                                                                        <strong>{{ $emp->LP }}</strong>
                                                                    </td>
                                                                @endif

                                                            </tr>
                                                            @php
                                                                $totalHBE += $emp->HBE;
                                                                $totalBA += $emp->BA;
                                                                $totalBRN += $emp->BRN;
                                                                $totalBHE += $emp->BHE;
                                                                $totalBDT += $emp->BDT;
                                                                $totalTG += $emp->TG;
                                                                $totalDAFP += $emp->DAFP;
                                                                $totalDANS += $emp->DANS;
                                                                $totalDJ += $emp->DJ;
                                                                $totalTD += $emp->TD;
                                                                $totalLP += $emp->LP;
                                                            @endphp
                                                        @endforeach
                                                    @else
                                                        no data
                                                    @endif
                                                </tbody>
                                                <tfoot>
                                                    <tr class="bg-totals">
                                                        <td colspan="4">Totales:</td>
                                                        <td class="f-currency"><strong>{{ $totalHBE }}</strong></td>
                                                        <td class="f-currency"><strong>{{ $totalBA }}</strong></td>
                                                        <td></td>
                                                        <td class="f-currency"><strong>{{ $totalBRN }}</strong></td>
                                                        <td></td>
                                                        <td class="f-currency"><strong>{{ $totalBHE }}</strong></td>
                                                        <td></td>
                                                        <td class="f-currency"><strong>{{ $totalBDT }}</strong></td>
                                                        <td class="f-currency"><strong>{{ $totalTG }}</strong></td>
                                                        <td class="f-currency"><strong>{{ $totalDAFP }}</strong></td>
                                                        <td class="f-currency"><strong>{{ $totalDANS }}</strong></td>
                                                        <td class="f-currency"><strong>{{ $totalDJ }}</strong></td>
                                                        <td class="f-currency"><strong>{{ $totalTD }}</strong></td>
                                                        <td class="f-currency"><strong>{{ $totalLP }}</strong></td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-5">

                                                    <table class="table table-bordered table-striped" id="totalsTable">
                                                        <thead>
                                                            <tr class="bg-fields">
                                                                <th colspan="5" style="text-align: center;">DETALLE
                                                                    BONOS</th>

                                                            </tr>
                                                            <tr class="bg-fields">
                                                                <th>Cod Bono</th>
                                                                <th>Detalle Bono</th>
                                                                <th>S. Conta</th>
                                                                <th>S. Audit</th>
                                                                <th>Diff</th>

                                                            </tr>

                                                        </thead>
                                                        @php
                                                            $totalAUD = 0;
                                                            $totalCON = 0;
                                                            $totalDIF = 0;
                                                        @endphp
                                                        <tbody>
                                                            @if ($totalBA > 0)
                                                                @php
                                                                    $totalAUD += $totalBA;
                                                                    $totalCON += $totalBA;
                                                                    $totalDIF += $totalBA_ - $totalBA;
                                                                @endphp
                                                                <tr>
                                                                    <td>BA</td>
                                                                    <td>Bono Antiguedad</td>
                                                                    <td class="f-currency">{{ $totalBA_ }}</td>
                                                                    <td class="f-currency">{{ $totalBA }}</td>
                                                                    @if ($totalBA_ - $totalBA != 0)
                                                                        <td class="bg-check f-currency">
                                                                            {{ $totalBA_ - $totalBA }}
                                                                        </td>
                                                                    @else
                                                                        <td class="bg-orange-1 f-currency">
                                                                            {{ $totalBA_ - $totalBA }}
                                                                        </td>
                                                                    @endif
                                                                    {{-- <td class="f-currency">{{ $totalBA_ - $totalBA }}</td> --}}
                                                                </tr>
                                                            @endif
                                                            @if ($totalBRN > 0)
                                                                @php
                                                                    $totalAUD += $totalBRN;
                                                                    $totalCON += $totalBRN;
                                                                    $totalDIF += $totalBRN_ - $totalBRN;
                                                                @endphp
                                                                <tr>
                                                                    <td>BRN</td>
                                                                    <td>Bono Recargo Nocturno</td>
                                                                    <td class="f-currency">{{ $totalBRN_ }}</td>
                                                                    <td class="f-currency">{{ $totalBRN }}</td>
                                                                    @if ($totalBRN_ - $totalBRN != 0)
                                                                        <td class="bg-check f-currency">
                                                                            {{ $totalBRN_ - $totalBRN }}
                                                                        </td>
                                                                    @else
                                                                        <td class="bg-orange-1 f-currency">
                                                                            {{ $totalBRN_ - $totalBRN }}
                                                                        </td>
                                                                    @endif
                                                                    {{-- <td class="f-currency">{{ $totalBRN_ - $totalBRN }}
                                                                    </td> --}}
                                                                </tr>
                                                            @endif
                                                            @if ($totalBHE > 0)
                                                                @php
                                                                    $totalAUD += $totalBHE;
                                                                    $totalCON += $totalBHE;
                                                                    $totalDIF += $totalBHE_ - $totalBHE;
                                                                @endphp
                                                                <tr>
                                                                    <td>BHE</td>
                                                                    <td>Bono Horas Extras</td>
                                                                    <td class="f-currency">{{ $totalBHE_ }}</td>
                                                                    <td class="f-currency">{{ $totalBHE }}</td>
                                                                    @if ($totalBHE_ - $totalBHE != 0)
                                                                        <td class="bg-check f-currency">
                                                                            {{ $totalBHE_ - $totalBHE }}
                                                                        </td>
                                                                    @else
                                                                        <td class="bg-orange-1 f-currency">
                                                                            {{ $totalBHE_ - $totalBHE }}
                                                                        </td>
                                                                    @endif
                                                                    {{-- <td class="f-currency">{{ $totalBHE_ - $totalBHE }}
                                                                    </td> --}}
                                                                </tr>
                                                            @endif
                                                            @if ($totalBDT > 0)
                                                                @php
                                                                    $totalAUD += $totalBDT;
                                                                    $totalCON += $totalBDT;
                                                                    $totalDIF += $totalBDT_ - $totalBDT;
                                                                @endphp
                                                                <tr>
                                                                    <td>BDT</td>
                                                                    <td>Bono Domingos Trabajados</td>
                                                                    <td class="f-currency">{{ $totalBDT_ }}</td>
                                                                    <td class="f-currency">{{ $totalBDT }}</td>
                                                                    @if ($totalBDT_ - $totalBDT != 0)
                                                                        <td class="bg-check f-currency">
                                                                            {{ $totalBDT_ - $totalBDT }}
                                                                        </td>
                                                                    @else
                                                                        <td class="bg-orange-1 f-currency">
                                                                            {{ $totalBDT_ - $totalBDT }}
                                                                        </td>
                                                                    @endif
                                                                    {{-- <td class="f-currency">{{ $totalBDT_ - $totalBDT }} --}}
                                                                    {{-- </td> --}}
                                                                </tr>
                                                            @endif


                                                        </tbody>
                                                        <tfoot>
                                                            <tr class="bg-totals">
                                                                <td colspan="2">Totales:</td>
                                                                <td class="f-currency">
                                                                    <strong>{{ $totalCON }}</strong>
                                                                </td>
                                                                <td class="f-currency">
                                                                    <strong>{{ $totalAUD }}</strong>
                                                                </td>
                                                                <td class="f-currency">
                                                                    <strong>{{ $totalDIF }}</strong>
                                                                </td>
                                                            </tr>
                                                        </tfoot>


                                                    </table>
                                                </div>
                                                <div class="col-md-2">

                                                </div>
                                                <div class="col-md-5">
                                                    <table class="table table-bordered table-striped" id="totalsTable">
                                                        <thead>
                                                            <tr class="bg-fields">
                                                                <th colspan="5" style="text-align: center;">DETALLE
                                                                    DESCUESTOS</th>

                                                            </tr>
                                                            <tr class="bg-fields">
                                                                <th>Cod Descuento</th>
                                                                <th>Detalle Descuento</th>
                                                                <th>S. Conta</th>
                                                                <th>S. Audit</th>
                                                                <th>Diff</th>

                                                            </tr>
                                                        </thead>
                                                        @php
                                                            $totalAUD_ = 0;
                                                            $totalCON_ = 0;
                                                            $totalDIF_ = 0;
                                                        @endphp
                                                        <tbody>
                                                            @if ($totalDAFP > 0)
                                                                @php
                                                                    $totalAUD_ += $totalDAFP;
                                                                    $totalCON_ += $totalDAFP;
                                                                    $totalDIF_ += $totalDAFP_ - $totalDAFP;
                                                                @endphp
                                                                <tr>
                                                                    <td>DAFP</td>
                                                                    <td>Descuento AFP</td>
                                                                    <td class="f-currency">{{ $totalDAFP_ }}</td>
                                                                    <td class="f-currency">{{ $totalDAFP }}</td>
                                                                    @if ($totalDAFP_ - $totalDAFP != 0)
                                                                        <td class="bg-check f-currency">
                                                                            {{ $totalDAFP_ - $totalDAFP }}
                                                                        </td>
                                                                    @else
                                                                        <td class="bg-orange-1 f-currency">
                                                                            {{ $totalDAFP_ - $totalDAFP }}
                                                                        </td>
                                                                    @endif
                                                                    {{-- <td class="f-currency">{{ $totalDAFP_ - $totalDAFP }}</td> --}}
                                                                </tr>
                                                            @endif
                                                            @if ($totalDANS > 0)
                                                                @php
                                                                    $totalAUD_ += $totalDANS;
                                                                    $totalCON_ += $totalDANS;
                                                                    $totalDIF_ += $totalDANS_ - $totalDANS;
                                                                @endphp
                                                                <tr>
                                                                    <td>DANS</td>
                                                                    <td>Descuento ANS</td>
                                                                    <td class="f-currency">{{ $totalDANS_ }}</td>
                                                                    <td class="f-currency">{{ $totalDANS }}</td>
                                                                    @if ($totalDANS_ - $totalDANS != 0)
                                                                        <td class="bg-check f-currency">
                                                                            {{ $totalDANS_ - $totalDANS }}
                                                                        </td>
                                                                    @else
                                                                        <td class="bg-orange-1 f-currency">
                                                                            {{ $totalDANS_ - $totalDANS }}
                                                                        </td>
                                                                    @endif
                                                                    {{-- <td class="f-currency">{{ $totalDANS_ - $totalDANS }}
                                                                    </td> --}}
                                                                </tr>
                                                            @endif
                                                            @if ($totalDJ > 0)
                                                                @php
                                                                    $totalAUD_ += $totalDJ;
                                                                    $totalCON_ += $totalDJ;
                                                                    $totalDIF_ += $totalDJ_ - $totalDJ;
                                                                @endphp
                                                                <tr>
                                                                    <td>DJ</td>
                                                                    <td>Descuento Jubilado</td>
                                                                    <td class="f-currency">{{ $totalDJ_ }}</td>
                                                                    <td class="f-currency">{{ $totalDJ }}</td>
                                                                    @if ($totalDJ_ - $totalDJ != 0)
                                                                        <td class="bg-check f-currency">
                                                                            {{ $totalDJ_ - $totalDJ }}
                                                                        </td>
                                                                    @else
                                                                        <td class="bg-orange-1 f-currency">
                                                                            {{ $totalDJ_ - $totalDJ }}
                                                                        </td>
                                                                    @endif
                                                                    {{-- <td class="f-currency">{{ $totalDJ_ - $totalDJ }}
                                                                    </td> --}}
                                                                </tr>
                                                            @endif
                                                            {{-- @if ($totalBDT > 0)
                                                                @php
                                                                    $totalAUD_ += $totalBDT;
                                                                    $totalCON_ += $totalBDT;
                                                                @endphp
                                                                <tr>
                                                                    <td>BDT</td>
                                                                    <td>Bono Domingos Trabajados</td>
                                                                    <td class="f-currency">{{ $totalBDT }}</td>
                                                                    <td class="f-currency">{{ $totalBDT }}</td>
                                                                    <td>50</td>
                                                                </tr>
                                                            @endif --}}
                                                        </tbody>
                                                        <tfoot>
                                                            <tr class="bg-totals">
                                                                <td colspan="2">Totales:</td>
                                                                <td class="f-currency">
                                                                    <strong>{{ $totalCON_ }}</strong>
                                                                </td>
                                                                <td class="f-currency">
                                                                    <strong>{{ $totalAUD_ }}</strong>
                                                                </td>
                                                                <td class="f-currency">
                                                                    <strong>{{ $totalDIF_ }}</strong>
                                                                </td>
                                                            </tr>
                                                        </tfoot>


                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="sheetSysTab_">
                                        <!-- The timeline -->
                                        <div class="card-body">
                                            <table id="dataTableSys" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr class="bg-fields">
                                                        {{-- <th>ID</th> --}}
                                                        <th>EMPLEADO</th>
                                                        <th>CI</th>
                                                        {{-- <th>INGRESO</th>
                                                        <th>NACIMIENTO</th> --}}

                                                        {{-- <th>EXT</th> --}}
                                                        {{-- <th>NACIONALIDAD</th> --}}
                                                        {{-- <th>SALARIO</th> --}}


                                                        {{-- <th>HABER BASICO</th>

                                                        @if (isset($data[0]->BA))
                                                            <th>BONO ANT</th>
                                                        @endif

                                                        @if (isset($data[0]->HRN))
                                                            <th>HRS REC NOC</th>
                                                        @endif

                                                        @if (isset($data[0]->BRN))
                                                            <th>TOT REC NOC</th>
                                                        @endif

                                                        @if (isset($data[0]->HE))
                                                            <th>HRS EXT</th>
                                                        @endif

                                                        @if (isset($data[0]->BHE))
                                                            <th>TOT HRS EXT</th>
                                                        @endif




                                                        @if (isset($data[0]->DT))
                                                            <th>DOM TRAB</th>
                                                        @endif
                                                        @if (isset($data[0]->BDT))
                                                            <th>TOT DOM TRAB</th>
                                                        @endif --}}
                                                        {{-- @if (isset($data[0]->AT))
                                                            <th>AÑOS ANTIGUEDAD</th>
                                                        @endif
                                                        @if (isset($data[0]->RS))
                                                            <th>RANGO SALARIAL</th>
                                                        @endif --}}



                                                        {{-- @if (isset($data[0]->TG))
                                                            <th>TOT GANADO</th>
                                                        @endif

                                                        @if (isset($data[0]->DAFP))
                                                            <th>AFP</th>
                                                        @endif

                                                        @if (isset($data[0]->DANS))
                                                            <th>ANS</th>
                                                        @endif

                                                        @if (isset($data[0]->DJ))
                                                            <th>DJ</th>
                                                        @endif

                                                        @if (isset($data[0]->TD))
                                                            <th>TOT DESC</th>
                                                        @endif --}}

                                                        @if (isset($data[0]->LP))
                                                            <th>LIQ PAG</th>
                                                        @endif

                                                        <th>SALARIO MINIMO X2</th>
                                                        <th>BASE IMPONIBLE</th>
                                                        <th>IMP RC-IVA</th>
                                                        <th>IVA DE 2 SALARIOS MINIMOS</th>
                                                        <th>IMP NETO RC-IVA</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- {{ $data[0] }} --}}
                                                    @php
                                                        $totalHBE = 0;
                                                        $totalBA = 0;
                                                        $totalBRN = 0;
                                                        $totalBHE = 0;
                                                        $totalBDT = 0;
                                                        $totalTG = 0;
                                                        $totalDAFP = 0;
                                                        $totalDANS = 0;
                                                        $totalDJ = 0;
                                                        $totalTD = 0;
                                                        $totalLP = 0;
                                                    @endphp
                                                    @if (isset($data))
                                                        @foreach ($data as $key => $emp)
                                                            <tr>

                                                                {{-- <td>{{ $emp->id }}</td> --}}
                                                                <td>{{ $emp->name }}</td>
                                                                <td>{{ $emp->document . $emp->extension }}</td>
                                                                {{-- <td>{{ $emp->admission_date }}</td>
                                                                <td>{{ $emp->birthdate }}</td> --}}

                                                                {{-- <td>{{ $emp->extension }}</td> --}}
                                                                {{-- <td>{{ $emp->nationality }}</td> --}}
                                                                {{-- <td>{{ $emp->salary }}</td> --}}



                                                                @if (isset($emp->LP))
                                                                    <td class="bg-green-3 f-currency">
                                                                        <strong>{{ $emp->LP }}</strong>
                                                                    </td>
                                                                @endif

                                                                <td class="bg-green-1 f-currency">
                                                                    <strong>4724</strong>
                                                                </td>
                                                                <td class="bg-green-1 f-currency">
                                                                    @if ($emp->LP > 4724)
                                                                        {{ $emp->LP - 4724 }}
                                                                    @else
                                                                        0
                                                                    @endif

                                                                </td>
                                                                <td class="bg-green-1 f-currency">
                                                                    @if ($emp->LP > 4724)
                                                                        {{ ($emp->LP - 4724) * 0.13 }}
                                                                    @else
                                                                        0
                                                                    @endif

                                                                </td>
                                                                <td class="bg-green-1 f-currency">
                                                                    @if ($emp->LP > 4724)
                                                                        {{ 4724 * 0.13 }}
                                                                    @else
                                                                        0
                                                                    @endif

                                                                </td>
                                                                <td class="bg-green-1 f-currency">
                                                                    @php
                                                                        $ivaLP = ($emp->LP - 4724) * 0.13;
                                                                        $ivaB2 = 4724 * 0.13;
                                                                    @endphp
                                                                    @if ($ivaLP > $ivaB2)
                                                                        {{ $ivaLP - $ivaB2 }}
                                                                    @else
                                                                        0
                                                                    @endif

                                                                </td>

                                                            </tr>
                                                            @php
                                                                $totalHBE += $emp->HBE;
                                                                $totalBA += $emp->BA;
                                                                $totalBRN += $emp->BRN;
                                                                $totalBHE += $emp->BHE;
                                                                $totalBDT += $emp->BDT;
                                                                $totalTG += $emp->TG;
                                                                $totalDAFP += $emp->DAFP;
                                                                $totalDANS += $emp->DANS;
                                                                $totalDJ += $emp->DJ;
                                                                $totalTD += $emp->TD;
                                                                $totalLP += $emp->LP;
                                                            @endphp
                                                        @endforeach
                                                    @else
                                                        no data
                                                    @endif
                                                </tbody>
                                                {{-- <tfoot>
                                                    <tr class="bg-totals">
                                                        <td colspan="4">Totales:</td>
                                                        <td class="f-currency"><strong>{{ $totalHBE }}</strong></td>
                                                        <td class="f-currency"><strong>{{ $totalBA }}</strong></td>
                                                        <td></td>
                                                        <td class="f-currency"><strong>{{ $totalBRN }}</strong></td>
                                                        <td></td>
                                                        <td class="f-currency"><strong>{{ $totalBHE }}</strong></td>
                                                        <td></td>
                                                        <td class="f-currency"><strong>{{ $totalBDT }}</strong></td>
                                                        <td class="f-currency"><strong>{{ $totalTG }}</strong></td>
                                                        <td class="f-currency"><strong>{{ $totalDAFP }}</strong></td>
                                                        <td class="f-currency"><strong>{{ $totalDANS }}</strong></td>
                                                        <td class="f-currency"><strong>{{ $totalDJ }}</strong></td>
                                                        <td class="f-currency"><strong>{{ $totalTD }}</strong></td>
                                                        <td class="f-currency"><strong>{{ $totalLP }}</strong></td>
                                                    </tr>
                                                </tfoot> --}}
                                            </table>
                                        </div>

                                    </div>

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
