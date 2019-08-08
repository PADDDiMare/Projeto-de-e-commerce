<?php
// Chamando o cabeçalho do site 
require ("header.php");
?>
<!DOCTYPE html>
<html>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
	<form method="post" action="logar.php" id="formlogin" name="formlogin" >
	<fieldset id="fie">
	<legend>LOGIN</legend><br />
	<br />
	<label>NOME : </label>
	<input type="text" name="login" id="login"  /><br />
	<br />
	<label>SENHA :</label>
	<input type="password" name="senha" id="senha" /><br />
	<br />
	<input type="submit" value="Entrar"  />
	</fieldset>
	</form>
	<!-- Rodapé da página --> 
	<br>
	<?php 
	// Chamando o rodapé do tema --> "_footer.php" //
	require ("footer.php");
	?>
</main>	
</html>