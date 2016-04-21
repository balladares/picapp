$(document).ready(function(){
	$("#btnCadastrar").click(function(e){
		e.preventDefault();

			var dados = $("#formCadastro").serialize();
			
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