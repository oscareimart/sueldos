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

        .pintaAmarillo {
            background-color: yellow;
        }

        .pintaVerde {
            background-color: #00ff5e
        }

        .pintaRojo {
            background-color: #ff0000;
            color: #ffffff;
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
                        <th>Año</th>
                        <th>Mes</th>
                        <th>Estado</th>
                        <th>Fecha Creacion</th>

                    </tr>
                </thead>
                <tbody>


                    @foreach ($data as $key => $d)
                        <tr>
                            {{-- @dump($d) --}}
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $d['name'] }}</td>
                            <td>{{ $d['year'] }}</td>
                            <td>{{ $d['month'] }}</td>
                            @if ($d['status'] == 1)
                                <td><span class="pintaAmarillo">Pendiente</span></td>
                            @elseif ($d['status'] == 2)
                                <td><span class="pintaRojo">Observado</span></td>
                            @elseif ($d['status'] == 3)
                                <td><span class="pintaVerde">No Observado</span></td>
                            @endif
                            {{-- <td>{{ $d['status'] }}</td> --}}
                            <td>{{ $d['created_at'] }}</td>
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
