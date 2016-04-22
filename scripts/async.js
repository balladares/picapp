$(document).ready(function(){
	// Trigger cadastro
	$("#btnCadastrar").click(function(e){
		e.preventDefault();
			var dados = $("#formCadastro").serialize();
			cadastraUsuario(dados);
	});

	// Trigger login
	$("#btnLogar").click(function(e){
		e.preventDefault();
			var dados = $("#formLogin").serialize();
			loginUsuario(dados);
	});

	// Cadastra usuario
	function loginUsuario(dados){
		$.ajax({
				type: "POST",
				url: "views/logar.view.php",
				data: dados,
				success: function(ret){
					$(".msg-retorno").html(ret);
				}
		});
	}

	// Faz login
	function cadastraUsuario(dados){
		$.ajax({
				type: "POST",
				url: "views/addUser.view.php",
				data: dados,
				success: function(ret){
					$(".msg-retorno").html(ret);
				}
		});
	}
});