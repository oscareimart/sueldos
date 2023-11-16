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
            font-size: 0.5em;
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
            <p>Reporte Historico por Empresa</p>
        </div>

        <div class="section">
            <h2 class="section-title">Detalle</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nro</th>
                        <th>Nombre</th>
                        <th>Carnet</th>
                        <th>HBE</th>
                        <th>HE</th>
                        <th>DT</th>
                        <th>HRN</th>
                        <th>PA</th>
                        <th>BHE</th>
                        <th>BRN</th>
                        <th>BDT</th>
                        <th>BA</th>
                        <th>TG</th>
                        <th>DAFP</th>
                        <th>DANS</th>
                        <th>DJ</th>
                        <th>TD</th>
                        <th>LP</th>
                        <th>year</th>
                        <th>month</th>


                    </tr>
                </thead>
                <tbody>


                    @foreach ($data as $key => $d)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->document . $d->extension }}</td>
                            {{-- <td>{{ $d->salary }}</td> --}}
                            <td>{{ $d->HE }}</td>
                            <td>{{ $d->HBE }}</td>
                            <td>{{ $d->DT }}</td>
                            <td>{{ $d->HRN }}</td>
                            <td>{{ $d->PA }}</td>
                            <td>{{ $d->BHE }}</td>
                            <td>{{ $d->BRN }}</td>
                            <td>{{ $d->BDT }}</td>
                            <td>{{ $d->BA }}</td>
                            <td>{{ $d->TG }}</td>
                            <td>{{ $d->DAFP }}</td>
                            <td>{{ $d->DANS }}</td>
                            <td>{{ $d->DJ }}</td>
                            <td>{{ $d->TD }}</td>
                            <td>{{ $d->LP }}</td>
                            <td>{{ $d->year }}</td>
                            <td>{{ $d->month }}</td>



                            </td>
                        </tr>
                    @endforeach

                    <!-- Agrega más filas según sea necesario -->
                </tbody>

            </table>
        </div>

        <!-- Agrega más secciones según sea necesario -->

    </div>
</body>

</html>
