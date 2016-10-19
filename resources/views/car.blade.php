<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
@include('menu');

Brand: {{$cars->modelo->brand->name}} <br>
Modelo: {{$cars->modelo->name}} <br>
Color: {{$cars->color}} <br>
KMS: {{$cars->kms}} <br>
Price: {{$cars->price}}

</body>
</html>