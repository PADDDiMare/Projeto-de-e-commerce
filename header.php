<!-- ?php
	/* require_once(inc/app.php); */
	session_start();
	if (!isset($_SESSION["email_logado"])) {
		header("Location:login.php");
	} else {
		$email = $_SESSION["email_logado"];
	}
	
? -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    <title>Quentnet</title>
    <!-- Principal CSS do Bootstrap -->
    <link href="theme/bootstrap-4.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Estilos customizados para esse template -->
    <link href="theme/carousel.css" rel="stylesheet">
  </head>
  <body>

    <header>
<nav class="navbar navbar-expand navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Quentnet</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"><span class="sr-only"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
    </ul>
<div class="col-4 d-flex justify-content-end align-items-center">
        <a class="text-muted" href="#">Login/Cadastro</a>&nbsp&nbsp&nbsp&nbsp
        <a class="btn btn-sm btn-outline-secondary" href="#"><img src="images/carrinho.png"></a>
      </div>
  </div>
</nav>
	<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-md-left" id="navbarsExample10">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Início<span class="sr-only">(atual)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">O Quentnet</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Cardápio</a>
            </li>
            <!--<li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
              <div class="dropdown-menu" aria-labelledby="dropdown10">
                <a class="dropdown-item" href="#">Item</a>
                <a class="dropdown-item" href="#">Outro item</a>
                <a class="dropdown-item" href="#">Algum outro item</a>
              </div>
            </li>-->
			<li class="nav-item">
              <a class="nav-link" href="#">Áreas de entrega</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="contatos.php">Fale Conosco</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
	
    <main role="main">


