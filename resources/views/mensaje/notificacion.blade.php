@if(Session::has('notices'))
<div class="alert alert-block alert-warning">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>
	<p>
		Favor de corregir :
	</p>
	<ul>
		@foreach(Session::get('notices') as $notice)
			<li> {{ $notice }} </li>
		@endforeach
	</ul>
</div>

@endif