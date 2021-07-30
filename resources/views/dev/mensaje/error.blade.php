@if ($errors->any())
<div class="alert alert-block alert-danger">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>
	<p>
		Favor de corregir :
	</p>
	<ul>
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>		
		@endforeach
	</ul>
</div>
@endif
