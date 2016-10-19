<!DOCTYPE html>
<html>
<head>
	<title>Lista de post</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
@include('menu')
<table class="table table-striped">
	<th>
		Marca
	</th>
	<th>
		Modelo
	</th>
	<th>
		Color
	</th>
	<th>
		KMS
	</th>

	<th>
		Features
	</th>
	<th>
		Precio
	</th>
	@foreach($cars as $car)
		<tr>
			<td>{{$car->modelo->brand->name}}</td>
			<td>{{$car->modelo->name}}</td>
			<td>{{$car->color}}</td>
			<td>{{$car->kms}}</td>
			@if($car['features']->isEmpty())
				<td>Sin features</td>
    		@else 
				<td>
				@foreach($car['features'] as $feature)
					"{{$feature['name']}}" 
				@endforeach
				</td>
			@endif
			
			<td>{{$car->price}}</td>
		</tr>
	@endforeach
</table>

</body>
</html>