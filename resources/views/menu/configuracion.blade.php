<li class="nav-item">
	<a class="nav-link with-sub" href="#">
		<span class="shape1"></span>
		<span class="shape2"></span>
		<i class="ti-panel sidemenu-icon"></i>
		<span class="sidemenu-label">C O N F I G</span>
		<i class="angle fe fe-chevron-right"></i>
	</a>
	<ul class="nav-sub">
		<li class="nav-sub-item">
			<a class="nav-sub-link" href="{{ url('configuracion') }}">Dashboard</a>
		</li>
		
		<li class="nav-sub-item">
			<a class="nav-sub-link" href="{{ route('mensajeria.index') }}">Mensajeria</a>
		</li>	
		<li class="nav-sub-item">
			<a class="nav-sub-link" href="{{ route('precio.index') }}">Precio</a>
		</li>
		<li class="nav-sub-item">
			<a class="nav-sub-link" href="{{ route('grupo.index') }}">Grupos Postales</a>
		</li>
		<li class="nav-sub-item">
			<a class="nav-sub-link" href="{{ route('zona.index') }}">Zonas de Envio</a>
		</li>

		<li class="nav-sub-item">
			<a class="nav-sub-link" href="{{ route('tipo.index') }}">Tipo Envios</a>
		</li>
	</ul>
</li>
