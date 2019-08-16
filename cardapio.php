<?php
session_start();
//include_once("conexao.php");
// Chamando o cabeçalho do tema --> "_header.php" //
	require_once("header.php");
	require ("app.php");
	//$list = listarProduto(NULL, NULL);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>QuentNet</title>
	<style>
.contatoContainer {
	display: flex; 
}
.listagem {
	display: inline-block;
    background-color: silver;
	overflow: auto;
	padding: 0.7rem;
	margin: 0,10;
}
	</style>
</head>
	
	<body>
	<h1 align="center">Comprar Produtos</h1>
	<div="container">
	  <div="listagem">

	
		</div>
	  </div>
	  

    <div class="container marketing">
	
	<?php
		$cnn = abrirConexao();
		$sql = "SELECT * FROM produtos";
		$resultado_sql = mysqli_query($cnn, $sql);
		$cont = "0"; 
		/*echo "<table width=\"88%\" height=\"10\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
							<tr>"; 
							while($ln = mysqli_fetch_assoc($resultado_sql)){	
								if($cont == "5"){ 
									echo "</tr><tr>";
									$cont = "0";
									///? ><div class="card-body"><?php
								}
									echo "<td align=center ><img src='".$ln['foto']."' width='150' height='150' border='0'><br>";
									echo $ln['nome']."<br>";
									echo 'Preço : R$ '.number_format($ln['preco'], 2, ',', '.').'';
									echo '<a href="carrinho.php?acao=add&id='.$ln['id'].'">Comprar</a><br>';
									echo "</td>"; 
									$cont++; 
							}
							echo "</tr></table>"; */
							?>
	
		<?php 
			while($ln = mysqli_fetch_assoc($resultado_sql)){
				if($cont == 0) {
					echo "<div class='row'>";
				}
		?>
			<div class=" col-md-4">
				<div class="card" >
					<img src="<?=$ln['foto']?>" class="card-img-top" alt="<?=$ln['nome']?>" height='150'>
					<div class="card-body">
						<h5 class="card-title"><?=$ln['nome']?></h5>
						<p class="card-text"><?=$ln['descricao']?></p>
						<p class="card-text">Preço: <?=$ln['preco']?></p>
						<a href="carrinho.php?acao=add&id='<?=$ln['id']?>" class="btn btn-primary">Comprar</a>
					</div>
				</div>
			</div>
			
			<?php 
				$cont++;
				if($cont >= 3) {
					$cont = 0;
					echo "</div>";
				}
			}
			?>
			</div>
		</div>
		
	

       
    </div><!-- /.container -->
<p>Final da Listagem</p>	
<?php 

// Chamando o rodapé do tema --> "_footer.php" //
require ("footer.php");
?>	
	</body>
	
</html>