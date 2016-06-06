
$(document).ready(function(){
	$('.input_form').trigger("reset");
	$('.input_form').validate({
		rules:{
			title: {
				required: true,
				minlength: 5
			},
			author: {
				required: true,
				minlength: 5
			},
			date: 'required',
			descr: 'required',
			userfile: 'required'
		},
		
		messages: {
			title:{
				required: "Digite o t&iacute;tulo do novo documento",
				minlength: "Um t&iacute;tulo deve ter, pelo menos, cinco letras!"
			},
			author: {
				required: "Digite o nome completo do autor do documento",
				minlength: "O nome deve ter, pelo menos, cinco letras!"
			},
			userfile: "Selecione um arquivo permitido (jpg, jpeg, pdf)",
			date: "É necessário fornecer a data de cadastro do documento",
			descr: "Descreva, brevemente, o conte&uacute;do deste documento"
		}
	});
});
