$(function() {
	'use strict'
	
	$('.select2').select2({
		placeholder: 'Choose one',
		width: '100%'
	});
	
	
	$('#enviosForm').parsley();
	$('#cotizacionesForm').parsley();
	$('#clienteForm').parsley();
	

});