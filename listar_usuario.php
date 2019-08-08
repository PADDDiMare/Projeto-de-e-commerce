
<?php 
/* esse bloco de código em php verifica se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na barra de endereço do seu navegador o caminho para a página principal do site (sistema), burlando assim a obrigação de fazer um login, com isso se ele não estiver feito o login não será criado a session, então ao verificar que a session não existe a página redireciona o mesmo  para a index.php.*/
session_start();
if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
{
  unset($_SESSION['login']);
  unset($_SESSION['senha']);
  header('location:index_php.php');
  }
 
$logado = $_SESSION['login'];
require ("header.php");
require ("app.php");
$list = listarUsuario();
?>


    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Usuário</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="editar_usuario.php" class="btn btn-sm btn-outline-primary">Novo usuário</a>
          </div>
        </div>
      </div>

      <h2>Resultado</h2>
	  <?php if(count($list)>0) { ?>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Id</th>
              <th>Nome</th>
			  <th>Usuário</th>
			  <th>E-mail</th>
              <th>Ativo</th>
            </tr>
          </thead>
          <tbody>
		  <?php foreach($list as $i) { ?>
            <tr>
              <td>#<?=$i["id"]?></td>
              <td><a href="editar_usuario.php?id=<?=$i["id"]?>"><?=$i["nome"]?></a></td>
			  <td><?=$i["usuario"]?></td>
			  <td><?=$i["email"]?></td>
              <td><?=$i["ativo"] == 1 ? "Sim" : "Não" ?></td>
            </tr>
		  <?php } ?>
          </tbody>
        </table>
      </div>
	  <?php } else { ?>
	  <div class="row">
		<div class="col-md-12">
			<p>Não foram encontrados registros de usuários.</p>
		</div>
	  </div>
	  <?php } ?>
    </main>
<?php 
// Chamando o rodapé do tema --> "_footer.php" //
require ("footer.php");
?>  