@if(Session::has('notices'))

<div class="alert alert-block alert-warning">
	<button type="button" class="close" data-dismiss="alert">
		<i class="ace-icon fa fa-times"></i>
	</button>

	@foreach(Session::get('notices') as $notice)
		<p></p>
		<strong> {{ $notice }} </strong> <i class="ace-icon fa fa-check green"></i>
	@endforeach
</div>

@endif