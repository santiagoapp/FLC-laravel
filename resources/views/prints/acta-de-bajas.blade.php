<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<style>	
	.arial {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 16px;
	}
	.negrita{
		font-weight: bold;
	}
	.justify {
		text-align: justify;
	}	
	.center {
		text-align: center;
	}	
	.table{
		width: 100%;
		margin: 20px 0 20px 0;
		border-collapse: collapse;
	}
	.bordes{
		border: 1px solid black;
		
	}
	.col {
		width: 46%;
	}
	.gap{
		width: 4%
	}
	.altura{
		height: 16px;
	}
	.page-break {
		page-break-after: always;
	}
	@page { margin: 0px; }
	body{
		margin: 151.181102362px 75.590551181px 113.385826772px 75.590551181px;
	}
</style>
<title>Flexilatina de Colombia</title>
</head>
<body>
	<h1 class="arial negrita center">ACTA PARA LA BAJA DE ACTIVOS No.________</h1>
	<h1 class="arial negrita center" style="margin-bottom: 40px;">AUTORIZACION</h1>
	<p class="justify arial">En las instalaciones de la compañía <span class="negrita">Flexilatina de Colombia Ltda</span>, siendo las [hora] horas del día [dia] de [mes] de [año], se reúnen:</p>
	<p class="justify arial">Quien solicita la Baja del Activo Fijo:</p>

	<table class="table">
		<thead>
			<tr>
				<th class="arial justify col">NOMBRE RESPONSABLE</th>
				<th class="gap"></th>
				<th class="arial justify col">CARGO</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="arial justify">{{ $operario->nombre}} {{ $operario->apellido}}</td>
				<td class="arial justify"></td>
				<td class="arial justify">{{ $cargo->nombre}}</td>
			</tr>
		</tbody>
	</table>

	<p class="justify arial">Quien autoriza la Baja del Activo Fijo:</p>
	
	<table class="table">
		<thead>
			<tr>
				<th class="arial justify col">NOMBRE RESPONSABLE</th>
				<th class="gap"></th>
				<th class="arial justify col">CARGO</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="arial justify">{{ $baja->autoriza }}</td>
				<td class="arial justify"></td>
				<td class="arial justify">Santiago Andrés Pereira</td>
			</tr>
		</tbody>
	</table>

	<p class="justify arial">Con el objeto de formalizar la baja definitiva de los bienes que se relacionan a continuación:</p>

	<table class="table bordes">
		<thead>
			<tr>
				<th class="arial bordes" style="width: 50%">ACTIVO PARA LA BAJA</th>
				<th class="arial bordes" style="width: 50%">MOTIVO</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="arial bordes">{{ $equipo->nombre }}</td>
				<td class="arial bordes">{{ $baja->autoriza }}</td>
			</tr>
		</tbody>
	</table>

	<p class="justify arial page-break">Los que en la presente participan, dan fe de que se realizó el acto por el que nos encontramos reunidos, con el objeto de levantar la presente acta, para dar de baja los bienes que se detallan en la relación, y declara que como resultado del análisis practicado a la existencia de dichos bienes, se determina que los mismos se encuentran en condiciones inútiles a criterio de los presentes, por lo que su reparación resulta innecesaria, determinándose como destino final ________________________________________________________________.</p>
	<p class="text-justify arial">Sin nada más que agregar se cierra la presente acta a las                      horas del mismo día de su levantamiento para los fines a que haya lugar.</p>

	<table class="table">
		<thead>
			<tr>
				<th class="arial justify col">RESPONSABLE</th>
				<th class="gap"></th>
				<th class="arial justify col">JEFE DE AEREA</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="arial justify altura"></td>
				<td class="arial justify altura"></td>
				<td class="arial justify altura"></td>
			</tr>
			<tr>
				<td class="arial justify">Nombre: ________________________</td>
				<td class="arial justify"></td>
				<td class="arial justify">Nombre: ________________________</td>
			</tr>
			<tr>
				<td class="arial justify">Firma: __________________________</td>
				<td class="arial justify"></td>
				<td class="arial justify">Firma: __________________________</td>
			</tr>
		</tbody>
	</table>

	<table class="table">
		<thead>
			<tr>
				<th class="arial justify col">VoBo Gerente General</th>
				<th class="gap"></th>
				<th class="arial justify col">VoBo Contadora</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="arial justify altura"></td>
				<td class="arial justify altura"></td>
				<td class="arial justify altura"></td>
			</tr>
			<tr>
				<td class="arial justify">____________________________</td>
				<td class="arial justify"></td>
				<td class="arial justify">____________________________</td>
			</tr>
		</tbody>
	</table>

	<p class="text-justify arial">Para uso contable.</p>

	<table class="table bordes">
		<thead>
			<tr>
				<th class="arial bordes" style="width: 25%">CUENTA</th>
				<th class="arial bordes" style="width: 25%">DESCRIPCCIÓN</th>
				<th class="arial bordes" style="width: 25%">DÉBITO</th>
				<th class="arial bordes" style="width: 25%">CREDITO</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="arial bordes altura"> </td>
				<td class="arial bordes altura"> </td>
				<td class="arial bordes altura"> </td>
				<td class="arial bordes altura"> </td>
			</tr>
			<tr>
				<td class="arial bordes altura"> </td>
				<td class="arial bordes altura"> </td>
				<td class="arial bordes altura"> </td>
				<td class="arial bordes altura"> </td>
			</tr>
			<tr>
				<td class="arial bordes altura"> </td>
				<td class="arial bordes altura"> </td>
				<td class="arial bordes altura"> </td>
				<td class="arial bordes altura"> </td>
			</tr>
			<tr>
				<td class="arial bordes altura"> </td>
				<td class="arial bordes altura"> </td>
				<td class="arial bordes altura"> </td>
				<td class="arial bordes altura"> </td>
			</tr>
			<tr>
				<td class="arial bordes altura"> </td>
				<td class="arial bordes altura">TOTALES </td>
				<td class="arial bordes altura"> </td>
				<td class="arial bordes altura"> </td>
			</tr>
		</tbody>
	</table>
</body>
</html>

