<?php 
	define("SERVIDOR", "127.0.0.1");
	define("PORTA", "3306");
	define("USUARIO", "root");
	define("SENHA", "");
	define("BD", "restaurante");
		
	function abrirConexao() {
		$cnn = mysqli_connect(SERVIDOR, USUARIO, SENHA, BD);
		return $cnn;
	}
	
	function fecharConexao($cnn) {
		mysqli_close($cnn);
	}
	
	function incluir($cnn, $sql) {
		$id = NULL;
		$query = mysqli_query($cnn, $sql);
		if(mysqli_affected_rows($cnn) > 0) {
			$id = mysqli_insert_id($cnn);
		}
		return $id;
	}
	
	function alterarOuExcluir($cnn, $sql) {
		$controle = false;
		$query = mysqli_query($cnn, $sql);
		if(mysqli_affected_rows($cnn) > 0) {
			$controle = true;
		} else {
			$controle = false;
		}
		return $controle;
	}
	
	function consultar($cnn, $sql) {
		$reg = NULL;
		$query = mysqli_query($cnn, $sql);
		if($r = mysqli_fetch_assoc($query)) {
			$reg = $r;
		}
		return $reg;
	}
	
	function listar($cnn, $sql) {
		$list = NULL;
		$query = mysqli_query($cnn, $sql);
		while($r = mysqli_fetch_assoc($query)) {
			$list[] = $r;
		}
		return $list;
	}
	
	function incluirSessao($nome, $ativo) {
		$cnn = abrirConexao();
		$nome = mysqli_real_escape_string($cnn, $nome);
		$ativo = mysqli_real_escape_string($cnn, $ativo);
		$id = incluir($cnn, "INSERT INTO sessao VALUES (NULL, '$nome', $ativo)");
		fecharConexao($cnn);
		return $id;
	}
	
	function alterarSessao($id, $nome, $ativo) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$nome = mysqli_real_escape_string($cnn, $nome);
		$ativo = mysqli_real_escape_string($cnn, $ativo);
		$con = alterarOuExcluir($cnn, "UPDATE sessao SET nome = '$nome', ativo = $ativo WHERE id = $id");
		fecharConexao($cnn);
		return $con;
	}
	function excluirSessao($id) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$con = alterarOuExcluir($cnn, "DELETE FROM sessao WHERE id = $id");
		fecharConexao($cnn);
		return $con;
	}
	function consultarSessao($id) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$arr = consultar($cnn, "SELECT id, nome, ativo FROM sessao WHERE id = $id");
		fecharConexao($cnn);
		return $arr;
	}
	function listarSessao($ativo) {
		$cnn = abrirConexao();
		$sql = "SELECT id, nome, ativo FROM sessao";
		if(!is_null($ativo)) {
			if($ativo) {
				$sql .= " WHERE ativo = 1";
			} else {
				$sql .= " WHERE ativo = 0";
			}
		}
		$arr = listar($cnn, $sql);
		fecharConexao($cnn);
		return $arr;
	}
	
	function incluirConteudo($dataPublicacao, $titulo, $texto, $ativo, $idSessao) {
		$cnn = abrirConexao();
		$dataPublicacao = mysqli_real_escape_string($cnn, $dataPublicacao);
		$titulo = mysqli_real_escape_string($cnn, $titulo);
		$texto = mysqli_real_escape_string($cnn, $texto);
		$ativo = mysqli_real_escape_string($cnn, $ativo);
		$idSessao = mysqli_real_escape_string($cnn, $idSessao);
		$id = incluir($cnn, "INSERT INTO conteudo VALUES (NULL,'$dataPublicacao', '$titulo', '$texto', $ativo, $idSessao)");
		fecharConexao($cnn);
		return $id;
	}
	
	function alterarConteudo($id, $dataPublicacao, $titulo, $texto, $ativo, $idSessao) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$dataPublicacao = mysqli_real_escape_string($cnn, $dataPublicacao);
		$titulo = mysqli_real_escape_string($cnn, $titulo);
		$texto = mysqli_real_escape_string($cnn, $texto);
		$ativo = mysqli_real_escape_string($cnn, $ativo);
		$idSessao = mysqli_real_escape_string($cnn, $idSessao);
		$con = alterarOuExcluir($cnn, "UPDATE conteudo SET data_publicacao='$dataPublicacao', titulo='$titulo', texto='$texto', ativo=$ativo, sessao_id=$idSessao WHERE id=$id");
		fecharConexao($cnn);
		return $con;
	}
	function excluirConteudo($id) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$con = alterarOuExcluir($cnn, "DELETE FROM conteudo WHERE id = $id");
		fecharConexao($cnn);
		return $con;
	}
	function consultarConteudo($id) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$arr = consultar($cnn, "SELECT c.*, s.nome AS nome_sessao FROM conteudo c INNER JOIN sessao s ON s.id = c.sessao_id WHERE c.id = $id");
		fecharConexao($cnn);
		return $arr;
	}
	function listarConteudo($idSessao, $ativo) {
		$cnn = abrirConexao();
		
		$sql = "SELECT c.*, s.nome AS nome_sessao FROM conteudo c INNER JOIN sessao s ON s.id = c.sessao_id WHERE 1 = 1 ";
		
		if(!is_null($idSessao)) {
			$idSessao = mysqli_real_escape_string($cnn, $idSessao);
			$sql .= " AND c.sessao_id = $idSessao";
		}
		
		if(!is_null($ativo)) {
			if($ativo) {
				$sql .= " AND c.ativo = 1";
			} else {
				$sql .= " AND c.ativo = 0";
			}
		}
		$arr = listar($cnn, $sql);
		fecharConexao($cnn);
		return $arr;
	}
	
	function incluirAcervo($titulo, $texto, $arquivo, $mine, $ordem, $ativo, $idConteudo) {
		$cnn = abrirConexao();
		$titulo = mysqli_real_escape_string($cnn, $titulo);
		$texto = mysqli_real_escape_string($cnn, $texto);
		$arquivo = mysqli_real_escape_string($cnn, $arquivo);
		$mine = mysqli_real_escape_string($cnn, $mine);
		$ordem = mysqli_real_escape_string($cnn, $ordem);
		$ativo = mysqli_real_escape_string($cnn, $ativo);
		$idConteudo = mysqli_real_escape_string($cnn, $idConteudo);
		$id = incluir($cnn, "INSERT INTO acervo VALUES (NULL, '$titulo', '$texto', '$arquivo', '$mine', $ordem, $ativo, $idConteudo)");
		fecharConexao($cnn);
		return $id;
	}
	
	function alterarAcervo($id, $titulo, $texto, $arquivo, $mine, $ordem, $ativo, $idConteudo) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$titulo = mysqli_real_escape_string($cnn, $titulo);
		$texto = mysqli_real_escape_string($cnn, $texto);
		if($arquivo == "-3") {
			$arquivo = NULL;
		} else {
			$arquivo = mysqli_real_escape_string($cnn, $arquivo);
		}
		$mine = mysqli_real_escape_string($cnn, $mine);
		$ordem = mysqli_real_escape_string($cnn, $ordem);
		$ativo = mysqli_real_escape_string($cnn, $ativo);
		$idConteudo = mysqli_real_escape_string($cnn, $idConteudo);
		
		$sql = "UPDATE acervo SET titulo='$titulo', texto='$texto'";
		if(!is_null($arquivo)) {
			$sql .= " , arquivo = '$arquivo' ";
		}
		$sql .= ", mine='$mine', ordem=$ordem, ativo=$ativo, conteudo_id=$idConteudo WHERE id = $id";

		$con = alterarOuExcluir($cnn, $sql);
		fecharConexao($cnn);
		return $con;
	}
	function excluirAcervo($id) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$con = alterarOuExcluir($cnn, "DELETE FROM acervo WHERE id = $id");
		fecharConexao($cnn);
		return $con;
	}
	function consultarAcervo($id) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$arr = consultar($cnn, "SELECT * FROM acervo WHERE id = $id");
		fecharConexao($cnn);
		return $arr;
	}
	
	function listarAcervo($idConteudo) {
		$cnn = abrirConexao();
		$sql = "SELECT * FROM acervo ";
		if(!is_null($idConteudo)) {
			$idConteudo = mysqli_real_escape_string($cnn, $idConteudo);
			$sql .= " WHERE conteudo_id = $idConteudo ";
		}
		$sql .= " ORDER BY ordem ASC, id DESC ";
		$arr = listar($cnn, $sql);
		fecharConexao($cnn);
		return $arr;
	}

///////////// USUARIOS ///////////////////////////
//////////////////////////////////////////////////
	function incluirUsuario($nome, $usuario, $email, $senha, $ativo) {
		$cnn = abrirConexao();
		$nome = mysqli_real_escape_string($cnn, $nome);
		$usuario = mysqli_real_escape_string($cnn, $usuario);
		$senha = mysqli_real_escape_string($cnn, $senha);
		$email = mysqli_real_escape_string($cnn, $email);
		$ativo = mysqli_real_escape_string($cnn, $ativo);
		$id = incluir($cnn, "INSERT INTO usuario VALUES (NULL, '$nome', '$usuario', MD5('$senha'), '$email', $ativo)");
		fecharConexao($cnn);
		return $id;
	}
	
	function alterarUsuario($id, $nome, $usuario, $email, $senha, $ativo) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$nome = mysqli_real_escape_string($cnn, $nome);
		$usuario = mysqli_real_escape_string($cnn, $usuario);
		$senha = mysqli_real_escape_string($cnn, $senha);
		$email = mysqli_real_escape_string($cnn, $email);
		$ativo = mysqli_real_escape_string($cnn, $ativo);
		$con = alterarOuExcluir($cnn, "UPDATE usuario SET nome='$nome', usuario='$usuario', senha=MD5('$senha'), email ='$email', ativo=$ativo WHERE id = $id");
		fecharConexao($cnn);
		return $con;
	}
	function excluirUsuario($id) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$con = alterarOuExcluir($cnn, "DELETE FROM usuario WHERE id = $id");
		fecharConexao($cnn);
		return $con;
	}
	function consultarUsuario($id) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$arr = consultar($cnn, "SELECT id, nome, usuario, email, ativo FROM usuario WHERE id = $id");
		fecharConexao($cnn);
		return $arr;
	}
	function listarUsuario() {
		$cnn = abrirConexao();
		$arr = listar($cnn, "SELECT id, nome, usuario, email, ativo  FROM usuario");
		fecharConexao($cnn);
		return $arr;
	}


///////////// LOCAIS DE ENTREGA ///////////////////////////
///////////////////////////////////////////////////////////

///////////// CATEGORIAS DE PRODUTOS ///////////////////////////
///////////////////////////////////////////////////////////
	function incluirCategoria($nome_cat, $ativo) {
		$cnn = abrirConexao();
		//$cod_cat = mysqli_real_escape_string($cnn, $cod_cat);
		$nome_cat = mysqli_real_escape_string($cnn, $nome_cat);
		$ativo = mysqli_real_escape_string($cnn, $ativo);
		$cod_cat = incluir($cnn, "INSERT INTO categorias VALUES (NULL,'$nome_cat','$ativo')");
		fecharConexao($cnn);
		return $cod_cat;
	}
	
	function alterarCategoria($cod_cat, $nome_cat, $ativo) {
		$cnn = abrirConexao();
		$cod_cat = mysqli_real_escape_string($cnn, $cod_cat);
		$nome_cat = mysqli_real_escape_string($cnn, $nome_cat);
		$ativo = mysqli_real_escape_string($cnn, $ativo);
		$con = alterarOuExcluir($cnn, "UPDATE categorias SET cod_cat='$cod_cat', nome_cat='$nome_cat', ativo=$ativo WHERE cod_cat = $cod_cat");
		fecharConexao($cnn);
		return $con;
	}
	function excluirCategoria($cod_cat) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $cod_cat);
		$con = alterarOuExcluir($cnn, "DELETE FROM categorias WHERE cod_cat = $id");
		fecharConexao($cnn);
		return $con;
	}
	function consultarCategoria($cod_cat) {
		$cnn = abrirConexao();
		$cep = mysqli_real_escape_string($cnn, $cod_cat);
		$arr = consultar($cnn, "SELECT cod_cat, nome_cat, ativo FROM categorias WHERE cod_cat = $cod_cat");
		fecharConexao($cnn);
		return $arr;
	}
	function listarCategoria() {
		$cnn = abrirConexao();
		$arr = listar($cnn, "SELECT cod_cat, nome_cat, ativo  FROM categorias");
		fecharConexao($cnn);
		return $arr;
	}
	
	

///////////// PRODUTOS ///////////////////////////
///////////////////////////////////////////////////////////
	function incluirProduto($codcat_id, $nome, $preco, $ativo,$foto,$descricao) {
		
			//se existir o arquivo
			if(isset($_FILES["arquivo"])){

				$arquivo = $_FILES["arquivo"];

				$pasta_dir = "fotos/";  //diretorio de foto dos produtos
				//se nao existir a pasta ele cria uma
				if(!file_exists($pasta_dir)){
				mkdir($pasta_dir);
				}

				//caminho do arquivo + mais o arquivo escolhido pelo usuario
				$arquivo_nome = $pasta_dir . $arquivo["name"];

				// Faz o upload da imagem
				move_uploaded_file($arquivo["tmp_name"], $arquivo_nome);

				//conecta no banco
			}
		
		
		$cnn = abrirConexao();
		$codcat_id = mysqli_real_escape_string($cnn, $codcat_id);
		$nome = mysqli_real_escape_string($cnn, $nome);
		$preco = mysqli_real_escape_string($cnn, $preco);
		$ativo = mysqli_real_escape_string($cnn, $ativo);
		$id = incluir($cnn, "INSERT INTO produtos (id, codcat_id,nome,preco,ativo,foto) VALUES (NULL,'$codcat_id','$nome','$preco','$ativo','$arquivo_nome')");
		fecharConexao($cnn);
		return $id;
	}
	
	function alterarProduto($id, $codcat_id, $nome, $preco, $ativo,$foto,$descricao) {
		
		// arquivo que esta no formulario
		$arquivo_form	= $_POST["arquivo"];


		//se existir o arquivo
		if(isset($_FILES["arquivo"])){

			$arquivo = $_FILES["arquivo"];

			$pasta_dir = "fotos/";  //diretorio dos arquivos
			//se nao existir a pasta ele cria uma
			if(!file_exists($pasta_dir)){
			mkdir($pasta_dir);
			}

			//caminho do arquivo + mais o arquivo escolhido pelo usuario
			$arquivo_nome = $pasta_dir . $arquivo["name"];

			// Faz o upload da imagem
			move_uploaded_file($arquivo["tmp_name"], $arquivo_nome);
		}
		

		// arquivo que esta no formulario
		$arquivo_form	= "$foto";


		//se existir o arquivo
		if(isset($_FILES["arquivo"])){

		$arquivo = $_FILES["arquivo"];

		$pasta_dir = "fotos/";  //diretorio dos arquivos
		//se nao existir a pasta ele cria uma
		if(!file_exists($pasta_dir)){
		mkdir($pasta_dir);
		}

		//caminho do arquivo + mais o arquivo escolhido pelo usuario
		$arquivo_nome = $pasta_dir . $arquivo["name"];

		// Faz o upload da imagem
		move_uploaded_file($arquivo["tmp_name"], $arquivo_nome);
		}		
		
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$codcat_id = mysqli_real_escape_string($cnn, $codcat_id);
		$nome = mysqli_real_escape_string($cnn, $nome);
		$preco= mysqli_real_escape_string($cnn, $preco);
		$ativo = mysqli_real_escape_string($cnn, $ativo);
		$descriao = mysqli_real_escape_string($cnn, $descricao);
		$con = alterarOuExcluir($cnn, "UPDATE produtos SET codcat_id=$codcat_id, nome='$nome',preco=$preco, ativo=$ativo,descricao=$descricao, foto=$arquivo_nome WHERE id = $id");
		fecharConexao($cnn);
		return $con;
	}
	function excluirProduto($id) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $cod_cat);
		$con = alterarOuExcluir($cnn, "DELETE FROM produtos WHERE id = $id");
		fecharConexao($cnn);
		return $con;
	}
	function consultarProduto($id) {
		$cnn = abrirConexao();
		$cep = mysqli_real_escape_string($cnn, $id);
		//$arr = consultar($cnn, "SELECT id, codcat_id, nome, preco, ativo,foto FROM produtos WHERE id = $id");
		
		$arr = consultar($cnn, "SELECT p.*, c.nome_cat AS categoria FROM produtos p INNER JOIN categorias c ON c.cod_cat = p.codcat_id WHERE p.id = $id");
		
		//$arr = consultar($cnn, "SELECT c.*, s.nome AS nome_sessao FROM conteudo c INNER JOIN sessao s ON s.id = c.sessao_id WHERE c.id = $id");		
		
		fecharConexao($cnn);
		return $arr;
	}
	/*
	function listarProduto() {
		$cnn = abrirConexao();
		$arr = listar($cnn, "SELECT id, nome, preco,codcat_id, ativo,foto  FROM produtos");
		fecharConexao($cnn);
		return $arr;
	}
	
	function listarProduto3() {
		$cnn = abrirConexao();
		$arr = listar($cnn, "SELECT p.*, c.nome_cat AS categoria FROM produtos p INNER JOIN categorias c ON c.cod_cat = p.codcat_id WHERE 1 = 1");
		fecharConexao($cnn);
		return $arr;
	}
	*/
	function listarProduto($idCod_cat, $ativo) {
		$cnn = abrirConexao();
		
		//$sql = "SELECT c.*, s.nome AS nome_sessao FROM conteudo c INNER JOIN sessao s ON s.id = c.sessao_id WHERE 1 = 1 ";
		
		// sessao(s) = categorias e conteudo(c) = produtos // idSessao = idCod_cat = cod_cat_id em produtos
		

		$sql = "SELECT p.*, c.nome_cat AS categoria FROM produtos p INNER JOIN categorias c ON c.cod_cat = p.codcat_id WHERE 1 = 1 ";
	
		if(!is_null($idCod_cat)) {
			$idCod_cat = mysqli_real_escape_string($cnn, $idCod_cat);
			$sql .= " AND p.codcat_id = $idCod_cat";
		}
		
		if(!is_null($ativo)) {
			if($ativo) {
				$sql .= " AND p.ativo = 1";
			} else {
				$sql .= " AND p.ativo = 0";
			}
		}
		$arr = listar($cnn, $sql);
		fecharConexao($cnn);
		return $arr;
	}	

	// CLIENTES //////////////////////
	

	

// ************ VALIDAÇÕES ****************************************
	function verificaEmail($email, $id) {
		$cnn = abrirConexao();
		$sql = "SELECT COUNT(*) AS valida FROM usuario WHERE 1=1 ";
		$email = mysqli_real_escape_string($cnn, $email);
		$sql .= " AND email = '$email' ";
		if(!is_null($id)) {
			$id = mysqli_real_escape_string($cnn, $id);
			$sql .= " AND id = $id ";
		}
		$arr = consultar($cnn, $sql);
		fecharConexao($cnn);
		return $arr;
	}
	function verificaCliente($email, $id) {
		$cnn = abrirConexao();
		$sql = "SELECT COUNT(*) AS valida FROM clientes WHERE 1=1 ";
		$email = mysqli_real_escape_string($cnn, $email);
		$sql .= " AND email = '$email' ";
		if(!is_null($id)) {
			$id = mysqli_real_escape_string($cnn, $id);
			$sql .= " AND id = $id ";
		}
		$arr = consultar($cnn, $sql);
		fecharConexao($cnn);
		return $arr;
	}	
	function verificaCep($cep) {
		$cnn = abrirConexao();
		$sql = "SELECT COUNT(*) AS valida FROM endereco WHERE 1=1 ";
		$cep = mysqli_real_escape_string($cnn, $cep);
		$sql .= " AND cep = '$cep' ";
		if(!is_null($cep)) {
			$cep = mysqli_real_escape_string($cnn, $cep);
			$sql .= " AND id = $cep ";
		}
		$arr = consultar($cnn, $sql);
		fecharConexao($cnn);
		return $arr;
	}
	function verificaFormaPag($nome) {
		$cnn = abrirConexao();
		$sql = "SELECT COUNT(*) AS valida FROM endereco WHERE 1=1 ";
		$cep = mysqli_real_escape_string($cnn, $nome);
		$sql .= " AND nome = '$nome' ";
		if(!is_null($nome)) {
			$cep = mysqli_real_escape_string($cnn, $nome);
			$sql .= " AND id = $nome ";
		}
		$arr = consultar($cnn, $sql);
		fecharConexao($cnn);
		return $arr;
	}	
	function verificaCategoria($cod_cat) {
		$cnn = abrirConexao();
		$sql = "SELECT COUNT(*) AS valida FROM categorias WHERE 1=1 ";
		$cep = mysqli_real_escape_string($cnn, $cod_cat);
		$sql .= " AND cod_cat = '$cod_cat' ";
		if(!is_null($cod_cat)) {
			$cep = mysqli_real_escape_string($cnn, $cod_cat);
			$sql .= " AND id = $cod_cat ";
		}
		$arr = consultar($cnn, $sql);
		fecharConexao($cnn);
		return $arr;
	}	
	function verificaProduto($nome, $id) {
		$cnn = abrirConexao();
		$sql = "SELECT COUNT(*) AS valida FROM produtos WHERE 1=1 ";
		$nome = mysqli_real_escape_string($cnn, $nome);
		$sql .= " AND nome = '$nome' ";
		if(!is_null($id)) {
			$id = mysqli_real_escape_string($cnn, $id);
			$sql .= " AND id = $id ";
		}
		$arr = consultar($cnn, $sql);
		fecharConexao($cnn);
		return $arr;
	}	
	function autenticacaoUsuario($usuario, $senha) {
		$cnn = abrirConexao();
		$arr = consultar($cnn, "SELECT id, nome, usuario, email FROM usuario WHERE usuario = '$usuario' AND senha = MD5('$senha') AND ativo = 1");
		fecharConexao($cnn);
		return $arr;
	}
	
	function criarCredencial($user) {
		session_start();
		$_SESSION["user"] =$user;
		header("location:index.php");
	}
	
	function validarCredencial() {
		session_start();
		if(!isset($_SESSION["user"])) {
			header("location:acesso.php");
		}
	}
	
	function destruirCredencial() {
		session_start();
		session_destroy();
		header("location:acesso.php");
	}
	
	function formataData($data){
		$data = explode(" ", $data);
		if(count(explode("/",$data[0])) > 1){
			$formate = implode("-",array_reverse(explode("/",$data[0]))) . " " .  $data[1];
		}elseif(count(explode("-",$data[0])) > 1){
			$formate = implode("/",array_reverse(explode("-",$data[0]))) . " " .  $data[1];
		}
		return $formate;
	}
	
	function uploadArquivo($file) {
		$_FILES['arquivo'] = $file;
		$nome = NULL;
		// Lista de tipos de arquivos permitidos
		$tiposPermitidos= array('image/gif', 'image/jpeg', 'image/pjpeg', 'image/png');
		// Tamanho máximo (em bytes)
		$tamanhoPermitido = 1024 * 1000; // 500 Kb
		// O nome original do arquivo no computador do usuário
		$arqName = $_FILES['arquivo']['name'];
		//echo $arqName . "<br>";
		// O tipo mime do arquivo. Um exemplo pode ser "image/gif"
		$arqType = $_FILES['arquivo']['type'];
		//echo $arqType . "<br>";
		// O tamanho, em bytes, do arquivo
		$arqSize = $_FILES['arquivo']['size'];
		//echo $arqSize . "<br>";
		// O nome temporário do arquivo, como foi guardado no servidor
		$arqTemp = $_FILES['arquivo']['tmp_name'];
		//echo $arqTemp . "<br>";
		// O código de erro associado a este upload de arquivo
		$arqError = $_FILES['arquivo']['error'];
		if ($arqError == 0) {
			// Verifica o tipo de arquivo enviado
			if (array_search($arqType, $tiposPermitidos) === false) {
				$nome = "-1";
			// Verifica o tamanho do arquivo enviado
			} else if ($arqSize > $tamanhoPermitido) {
				$nome = "-2";
			// Não houveram erros, move o arquivo
			} else {
				$pasta = '../upload/';
				// Pega a extensão do arquivo enviado
				$extensao = strtolower(end(explode('.', $arqName)));
				// Define o novo nome do arquivo usando um UNIX TIMESTAMP
				$nome = time() . '.' . $extensao;
				$upload = move_uploaded_file($arqTemp, $pasta . $nome);
			}
		} else {
			$nome = "-3";
		}
		return $nome;
	}
	
	// Formas de pagamento //////////////////////
	function incluirFormapag($nome, $ativo) {
		$cnn = abrirConexao();
		$nome = mysqli_real_escape_string($cnn, $nome);
		$usuario = mysqli_real_escape_string($cnn, $usuario);
		$senha = mysqli_real_escape_string($cnn, $senha);
		$email = mysqli_real_escape_string($cnn, $email);
		$ativo = mysqli_real_escape_string($cnn, $ativo);
		$id = incluir($cnn, "INSERT INTO forma_pag VALUES (NULL, '$nome', $ativo)");
		fecharConexao($cnn);
		return $id;
	}
	
	function alterarFormapag($id, $nome, $ativo) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$nome = mysqli_real_escape_string($cnn, $nome);
		$ativo = mysqli_real_escape_string($cnn, $ativo);
		$con = alterarOuExcluir($cnn, "UPDATE forma_pag SET nome='$nome', ativo=$ativo WHERE id = $id");
		fecharConexao($cnn);
		return $con;
	}
	function excluirFormapag($id) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$con = alterarOuExcluir($cnn, "DELETE FROM forma_pag WHERE id = $id");
		fecharConexao($cnn);
		return $con;
	}
	function consultarFormapag($id) {
		$cnn = abrirConexao();
		$id = mysqli_real_escape_string($cnn, $id);
		$arr = consultar($cnn, "SELECT id, nome, ativo FROM forma_pag WHERE id = $id");
		fecharConexao($cnn);
		return $arr;
	}
	function listarFormapag() {
		$cnn = abrirConexao();
		$arr = listar($cnn, "SELECT id, nome, ativo  FROM forma_pag");
		fecharConexao($cnn);
		return $arr;
		

	}	
	///////////////////// PEDIDOS /////////////////////////////////////////////////////
	function consultarPedido($id) {
		$cnn = abrirConexao();
		$cep = mysqli_real_escape_string($cnn, $id);
		//$arr = consultar($cnn, "SELECT id, codcat_id, nome, preco, ativo,foto FROM produtos WHERE id = $id");
		
		$arr = consultar($cnn, "SELECT p.*, c.nome_cat AS categoria FROM produtos p INNER JOIN categorias c ON c.cod_cat = p.codcat_id WHERE p.id = $id");
		
		//$arr = consultar($cnn, "SELECT c.*, s.nome AS nome_sessao FROM conteudo c INNER JOIN sessao s ON s.id = c.sessao_id WHERE c.id = $id");		
		
		fecharConexao($cnn);
		return $arr;
	}
	/*
	function listarProduto() {
		$cnn = abrirConexao();
		$arr = listar($cnn, "SELECT id, nome, preco,codcat_id, ativo,foto  FROM produtos");
		fecharConexao($cnn);
		return $arr;
	}
	
	function listarProduto3() {
		$cnn = abrirConexao();
		$arr = listar($cnn, "SELECT p.*, c.nome_cat AS categoria FROM produtos p INNER JOIN categorias c ON c.cod_cat = p.codcat_id WHERE 1 = 1");
		fecharConexao($cnn);
		return $arr;
	}
	*/
	function listarPedido($cliente_id, $ativo) {
		$cnn = abrirConexao();
		
		//$sql = "SELECT c.*, s.nome AS nome_sessao FROM conteudo c INNER JOIN sessao s ON s.id = c.sessao_id WHERE 1 = 1 ";
		
		// sessao(s) = categorias e conteudo(c) = produtos // idSessao = idCod_cat = cod_cat_id em produtos
		

		$sql = "SELECT p.*, c.nome AS cliente FROM pedido p INNER JOIN clientes c ON c.id = p.cliente_id WHERE 1 = 1 ";
	
		if(!is_null($cliente_id)) {
			$cliente_id = mysqli_real_escape_string($cnn, $cliente_id);
			$sql .= " AND p.cliente_id = $cliente_id";
		}
		
		if(!is_null($ativo)) {
			if($ativo) {
				$sql .= " AND p.ativo = 1";
			} else {
				$sql .= " AND p.ativo = 0";
			}
		}
		$arr = listar($cnn, $sql);
		fecharConexao($cnn);
		return $arr;
	}	
	
?>