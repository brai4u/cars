 <ul>
  <li><a href="/cars/addcars/admin">Crear todo (admin)</a></li>
  <li><a href="/cars/addcars/vendedor">Agregar auto (vendedor)</a></li>
  <li><a href="/addbrand">Crear marca (admin)</a></li>
  <li><a href="/cars">Ver lista (vendedor)</a></li>

  <li style="float: left;right: 0px;position: absolute;">
  	<a href="#">
  		User: {{Auth::user()->name}} ({{Auth::user()->user_type}})
  	</a>
  </li>
</ul> 