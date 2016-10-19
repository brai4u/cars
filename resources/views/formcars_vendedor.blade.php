<!DOCTYPE html>
<html>
<head>
	<title>Vendedor</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/css/style.css">
	<meta charset="UTF-8">
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
	<form method="POST" action="{{URL::to('cars')}}">
		<div class="form-group">
			<label for="brand">Brand</label>
			<select class="form-control" name="brand" id="brand">
				<option class="optionbrand" value="selecteabrand">Select a brand</option>
				@foreach($brands as $brand)
					<option class="optionbrand" value="{{$brand->id}}">{{$brand->name}}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
			<label for="models">Model</label>
			<select class="form-control" name="model" id="models" disabled>
					<option value="">models</option>
			</select>
		</div>
		
		<div class="form-group">
			<label for="color">Color</label>
			<input type="text" class="form-control" name="color" id="color" placeholder="Color del auto">
		</div>

		<div class="form-group">
			<label for="year">Year</label>
			<input type="text" class="form-control" name="year" id="year" placeholder="Year">
		</div>

		<div class="form-group">
			<label for="kms">KMS</label>
			<input type="text" class="form-control" id="kms" name="kms" placeholder="KMS del auto">
		</div>

		<div class="form-group">
			<label for="features">Features</label>
			<select class="form-control" id="features" name="features[]" multiple>
				@foreach($features as $feature)
					<option value="{{$feature->id}}">{{$feature->name}}</option>
				@endforeach
			</select>
		</div>

		<div class="form-group">
		    <label for="price">Price</label>
		    <div class="input-group">
		      <div class="input-group-addon">$</div>
		      <input type="text" class="form-control" id="price" name="price" placeholder="Amount">
		      <div class="input-group-addon">.00</div>
		    </div>
		  </div>

		<input type="hidden" name="_method" value="POST">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
		<button type="submit" class="btn btn-default">Create car</button>
	</form>
</div>

<script type="text/javascript">
	var brands = <?=json_encode($brands); ?>;
	var modelos = <?=json_encode($modelos); ?>;
	
	$('#brand').change(function (){
		var selectBrand = this.value

		$('#models').html('');
		$('#models').removeAttr('disabled');

		$.each( modelos, function( key, value ) {
				if(value.brand_id == selectBrand){
					$('#models').append('<option value="'+value.id+'">'+value.name+'</option>');
				}
		});
	});

	//console.log(brand[1]['name']);
</script>

</body>
</html>