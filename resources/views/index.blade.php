@include('layouts.principal')

	<table class="table table-striped table-bordered table-hover table-dark text-center">
		<thead>
            <tr>
                <!-- Creamos el nombre de las columnas -->
                @foreach($columnas as $columna)
                    <th>{{$columna}}</th>        
                @endforeach
			</tr>
		</thead>
		
        <tbody>
            <!-- Recorremos el array de info global para acceder a la informacion de una ciudad y crear la fila correspondiente -->
            @foreach($info as $info_ciudad)
                <tr>
                    <!-- En cada ciudad accedemos a sus datos -->
                    @foreach($info_ciudad as $dato_ciudad)
                        <td>{{$dato_ciudad}}</td>
                    @endforeach
                </tr>
            @endforeach
		</tbody>
	</table>
              
    <a href="{{ url('correoenviado') }}" class="btn btn-info">Enviar información por mail</a>
    

@include('layouts.scripts')