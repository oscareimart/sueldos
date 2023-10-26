<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 0.9em;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .section {
            margin-bottom: 30px;
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
            <p>Este Reporte muestra los valores observador de acuerdo a la planilla importada vs la planilla generada
                por sistema</p>
        </div>

        <div class="section">
            <h2 class="section-title">Detalle</h2>
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Carnet</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($employees as $d)
                        <tr>
                            <td>{{ $d->name }}</td>
                            <td>{{ $d->document . $d->extension }}</td>
                            <td>
                                @foreach ($errors as $e)
                                    @if ($e['employee_id'] == $d->id)
                                        {{ '- ' . $e['obs'] }}<br>
                                    @endif
                                @endforeach
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
