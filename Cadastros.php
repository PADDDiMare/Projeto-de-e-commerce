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
?>


<style type="text/css">
<!--
.style1 {
	color: #FF0000;
	font-size: x-small;
}
.style3 {color: #0000FF; font-size: x-small; }
-->
</style>
<!--

-->

</head>

<body>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <!-- div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Usuário</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="editar_usuario.php" class="btn btn-sm btn-outline-primary">Novo usuário</a>
          </div>
        </div>
      </div -->
	  
	<h3><?php echo" Bem vindo $logado";?></h3>
    <p>Manutenção de Cadastros</p>
        <span>
            <ul>
				<li><a href="listar_usuario.php" title="Usuários do Sistema">Usuários</a></li>
				<li><a href="listar_enderecos.php" title="Locais de Entrega">Locais de Entrega</a></li>				
				<br>
                <li><a href="listar_categorias.php" title="Categoria de Produtos">Categoria de Produtos</a></li>
                <li><a href="listar_produtos.php" title="Cadastro de Produtos">Produtos</a></li>
                <br>
				<li><a href="listar_formapag.php" title="Formas de Pagamento" >Formas de Pagamento</a></li>
				<li><a href="listar_Pedidos.php" title="Edição de Pedidos" >Pedidos</a></li>
				<br>
                <li><a href="listar_clientes.php" title="Cadastros de Clientes">Clientes</a></li>
				<br>				
				<!-- Somente Listar os contatos em ordem decrescente e visualizar o registro com clique no registro da lista. listar_contatos.php  -->
                <li><a href="contatos.php" title="Leitura de Contatos">Contatos</a></li>				
				<br>
				<li><a href="imagens.php" title="Imagens">Teste de Listar Imagens</a></li>				
            </ul>
        </span>
     <nav>			
			
            
			           			
                       
			
     </nav>			
	</main>
</body>
</html>


<?php 
// Chamando o rodapé do tema --> "_footer.php" //
require ("footer.php");
?>