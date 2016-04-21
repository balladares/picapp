$(document).ready(function(){
	$("#btnLogar").click(function(e){
		e.preventDefault();

			var dados = $("#formLogin").serialize();
			
			cadastraUsuario(dados);


	});

	// Funções assincronas
	function cadastraUsuario(dados){
		$.ajax({
				type: "POST",
				url: "views/addUser.view.php",
				data: dados,
				successs: function(ret){
					$(".msg-retorno").html();
				}
		});
	}
});