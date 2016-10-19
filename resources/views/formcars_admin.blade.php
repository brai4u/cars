<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
@include('menu');
<div id="createuser">
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Auth::user()->user_type != "admin")
	redirect('cars.dev/login')
@endif
	<form method="POST" action="{{URL::to('cars')}}">
		<div class="form-group">
			<label for="brand">Brand</label>
			<input type="text" class="form-control" name="brand" id="brand" placeholder="Marca del auto">
		</div>

		<div class="form-group">
			<label for="model">Model</label>
			<input type="text" class="form-control" name="model" id="model" placeholder="Modelo del auto">
		</div>
		
		<div class="form-group">
			<label for="color">Color</label>
			<input type="text" class="form-control" name="color" id="color" placeholder="Color del auto">
		</div>

		<div class="form-group">
			<label for="kms">KMS</label>
			<input type="text" class="form-control" id="kms" name="kms" placeholder="KMS del auto">
		</div>

		<div class="form-group">
			<label for="price">Price</label>
			<input type="text" class="form-control" id="price" name="price" placeholder="Precio del auto">
		</div>

		<input type="hidden" name="_method" value="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<button type="submit" class="btn btn-default">Create car</button>
	</form>
</div>
</body>
</html>