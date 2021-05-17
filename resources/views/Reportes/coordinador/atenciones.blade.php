<div class="container">
    <h5 style="text-align: center"><strong>REPORTE DE ATENCIONES</strong></h5>
    <table class="table table-striped">
        <thead>
            <tr>
                <th width="25" style="vertical-align: middle; background-color: #D44C4C" scope="col"> Fecha de Atención</th>
                <th width="10" style="vertical-align: middle; background-color: #D44C4C" scope="col"> Estado</th>
                <th width="25" style="vertical-align: middle; background-color: #D44C4C" scope="col"> Tipo de Control</th>
                <th width="25" style="vertical-align: middle; background-color: #D44C4C" scope="col"> Sector</th>
                <th width="25" style="vertical-align: middle; background-color: #D44C4C" scope="col">Geolocalización Latitud Atención</th>
                <th width="25" style="vertical-align: middle; background-color: #D44C4C" scope="col">Geolocalización Longitud Atención</th>
                <th width="100" style="vertical-align: middle; background-color: #D44C4C" scope="col"> Detalle Atención</th>

                <th width="100" style="vertical-align: middle; background-color: #D44C4C" scope="col"> Observacion de Atención</th>

                
            </tr>
        </thead>
        <tbody>
            @foreach ($atenciones as $atencion)
            <tr>

                <td>{{ $atencion['fecha_atencion'] }}</td>
                <td>{{ $atencion['estado'] }}</td>
                <td>{{ $atencion['tipo']['nombre'] }}</td>
                <td>{{ $atencion['sector'] }}</td>
        
                <td>{{ $atencion['latitud'] }}</td>
                <td>{{ $atencion['longitud'] }}</td>
                <td>{{ $atencion['detalle'] }}</td>

                <td>{!!  $atencion['observacion']  !!}</td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>