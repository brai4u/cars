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

@if($msg == 'ok')
    <div class="alert alert-success">
		<li>Marca creada :)</li>
	</div>
@endif
	<form method="POST" action="{{URL::to('addbrand')}}">
		<div class="form-group">
			<label for="brand">Brand</label>
			<input type="text" class="form-control" name="brand" id="brand" placeholder="Brand name">
		</div>
		
		<input type="hidden" name="_method" value="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<button type="submit" class="btn btn-default">Create brand</button>
	</form>
</div>
</body>
</html>