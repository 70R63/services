@if(Session::has('notices'))
<div>
	
	<div class="alert alert-block alert-warning">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>

		@foreach(Session::get('notices') as $notice)
			<p></p>
			<strong><i class="ace-icon fa fa-check green"></i> {{ $notice }} </strong>
		@endforeach
	</div>
</div>

@endif