<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta name="robots" content="noindex">
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?=URL?>/images/logo_green_site.png.webp">
  <link rel="icon" type="image/png" href="<?=URL?>/images/logo_green_site.png.webp">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/Login.css">
  <link rel="stylesheet" href="./css/Pages.css">
  <link rel="stylesheet" href="./css/Perfil.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet" id="bootstrap-css"> 
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="https://cdn.es.gov.br/fonts/font-awesome/css/font-awesome.min.css" id="boo">
  
  <!-- Script para fechar o toast (caixa de alerta que abre no canto superior esquerdo) -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<div>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Navbar brand -->

      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <i class="fas fa-bars text-light"></i>
      </button>

      <!-- Collapsible wrapper -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left links -->
        
        <ul class="navbar-nav me-auto d-flex flex-row mt-3 mt-lg-0">
          <li class="nav-item text-center mx-2 mx-lg-1">
            <a class="nav-link active" aria-current="page" href="<?= URL ?>/Home">
              <div>
                <i class="fas fa-home fa-lg mb-1"></i>
              </div>
              Home
            </a>
          </li>
        </ul>
        
        <form class="d-flex input-group ms-3 w-25 ms-lg-3 my-3 my-lg-0">
          <input type="search" id="pesquisa" name="pesquisa" class="form-control" placeholder="Search" aria-label="Search" />
          <button id="buttonPesquisa" class="btn btn-primary" type="button" data-mdb-ripple-color="dark">
            Pesquisar
          </button>
        </form>
        <!-- Left links -->

        <!-- Right links -->
        <ul class="navbar-nav ms-auto d-flex flex-row mt-3 mt-lg-0">
          <li class="nav-item text-center mx-2 mx-lg-1">
            <a class="nav-link" href="<?=URL?>/request/logoff">
              <div>
              <i class="fas fa-power-off fa-lg mb-1"></i>
                <span class="badge rounded-pill badge-notification bg-info"></span>
              </div>
              logoff
            </a>
          </li>
        </ul>
        <!-- Right links -->

      </div>
      <!-- Collapsible wrapper -->
    </div>
    <!-- Container wrapper -->
  </nav>
</div>

<script>

  document.getElementById("buttonPesquisa").addEventListener("click", pesquisa, false);

  function pesquisa(){
    var pesquisaKey = document.getElementById("pesquisa").value;
    window.location.href = `<?= URL ?>/Pesquisa/${pesquisaKey}`;
  }

</script>