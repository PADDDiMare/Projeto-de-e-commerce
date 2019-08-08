<?php
require ("header.php");
?>
<link rel="stylesheet" href="css/contatos(2).css">

<div class="contatoContainer">

	<div class="contatoesquerda">
		<h3>Espaço Reservado a Outros</h3>		
		
	</div>
	
	<div class="contatoForm">

		<form method="post" name="formHTML" id="formHTML" action="processa.php">

		<p>
			<label for="formNome">Nome:</label>
			<input type="text" name="formNome" id="formNome" placeholder="Escreva seu nome completo" required>
		</p>

		<p>
			<label for="formFone">Telefone:</label>
			<input type="text" name="formFone" id="formFone" placeholder="Seu Telefone" maxlength="14">
			
		</p>
		
		<p>
			<label for="formEmail">E-mail:</label>
			<input type="email" name="formEmail" id="formEmail" placeholder="Escreva um e-mail válido" required>
		</p>

		<p>
			<label for="formAssunto">Assunto:</label>
			<input type="text" name="formAssunto" id="formAssunto" value="Informe o Assunto">
		</p>


		<p>
			<label for="formMensagem">Mensagem:</label>
			<textarea name="formMensagem" id="formMensagem" placeholder="Escreva sua mensagem"></textarea>
		</p>

		<p>
			<label></label>
			<button type="submit" name="formEnvia" id="formEnvia" value="Enviar">Enviar</button>
			<small>&larr; Clique somente uma vez.</small>
			&nbsp;&nbsp;&nbsp;
			<button type="reset" name="formReset" id="formReset" value="Limpar">Limpar campos</button>
		</p>

		</form>
		
	</div>
	
	<div class="contatoLateral">
		<h3>Espaço Reservado a Outros</h3>

	</div>

</div>	
<?php 
// Chamando o rodapé do tema --> 
require ("footer.php");
?>