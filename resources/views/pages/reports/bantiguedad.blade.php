<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            /* font-size: 0.7em; */
        }

        .container {
            max-width: 950px;
            margin: 0 auto;
            padding: 10px;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }

        .section {
            margin-bottom: 15px;
        }

        .section-title {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>{{ $title }}</h1>
            <h2>{{ $subtitle }}</h2>
            <p>Fecha: {{ $date }}</p>
        </div>

        <div class="section">
            <h2 class="section-title">Descripcion:</h2>
            <p>Este Reporte muestra los valores observador del Bono Antiguedad de acuerdo a la planilla importada vs la
                planilla generada
                por sistema</p>
        </div>

        <div class="section">
            <h2 class="section-title">Detalle</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>Nombre</th>
                        <th>Carnet</th>
                        <th>BA Empresa</th>
                        <th>BA Sistema</th>
                        <th>Diferencia</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>

                    @php
                        $totalBAE = 0;
                        $totalBA = 0;
                        $totalDIF = 0;
                    @endphp
                    @foreach ($data as $key => $d)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->document . $d->extension }}</td>
                            <td>{{ $d->BAE }}</td>
                            <td>{{ $d->BA }}</td>
                            <td>{{ $d->BAE - $d->BA }}</td>
                            <td>{{ $d->BAE - $d->BA > 0 ? 'Diferencia encontrada, con faltante revisar calculos' : 'Diferencia encontrada, con excedente revisar calculos' }}
                            </td>
                        </tr>

                        @php
                            $totalBAE += $d->BAE;
                            $totalBA += $d->BA;
                            $totalDIF += $d->BAE - $d->BA;
                        @endphp
                    @endforeach

                    <!-- Agrega más filas según sea necesario -->
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">Totales:</td>
                        <td>{{ $totalBAE }}</td>
                        <td>{{ $totalBA }}</td>
                        <td>{{ $totalDIF }}</td>
                        <td></td>

                    </tr>
                </tfoot>
            </table>
        </div>

        <!-- Agrega más secciones según sea necesario -->

    </div>
</body>

</html>
