$(function() {
	'use strict'
	
	$('.select2').select2({
		placeholder: 'Choose one',
		width: '100%'
	});
	$('#selectForm1').parsley();
	$('#selectForm21').parsley();
	$('#enviosForm').parsley();
	$('#cotizacionesForm').parsley();
});