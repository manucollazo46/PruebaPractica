<table>
		<thead>
            <tr>
                <!-- Creamos el nombre de las columnas -->
                @foreach($array_nombre_datos as $columna)
                    <th>{{$columna}}</th>        
                @endforeach
			</tr>
		</thead>
		
        <tbody>
            <!-- Recorremos el array de info global para acceder a la informacion de una ciudad y crear la fila correspondiente -->
            @foreach($info_total as $info_ciudad)
                <tr>
                    <!-- En cada ciudad accedemos a sus datos -->
                    @foreach($info_ciudad as $dato_ciudad)
                        <td>{{$dato_ciudad}}</td>
                    @endforeach
                </tr>
            @endforeach
		</tbody>
	</table>