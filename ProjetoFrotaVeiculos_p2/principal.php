<?php
    require("cabecalho.php");
?>
    <div class="p-5 mb-4 bg-white rounded-3 shadow-sm">
      <div class="container-fluid py-3">
        <h1 class="display-5 fw-bold">Seja bem-vindo(a), <?= htmlspecialchars($_SESSION['nome']) ?>!</h1>
        <p class="col-md-10 fs-4">
            Este é o seu painel de gerenciamento de frotas. 
            Use os links abaixo ou o menu de navegação para começar.
        </p>
      </div>
    </div>

    <h2>Acesso Rápido</h2>
    <hr class="mb-4">
    
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4">
      
      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Veículos (RF1)</h5>
            <p class="card-text">Gerencie os veículos da frota, incluindo placas, modelos e tipos.</p>
          </div>
          <div class="card-footer bg-white border-0">
            <a href="veiculos.php" class="btn btn-primary w-100">Gerenciar Veículos</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Motoristas (RF2)</h5>
            <p class="card-text">Cadastre e edite as informações dos motoristas da empresa.</p>
          </div>
          <div class="card-footer bg-white border-0">
            <a href="motoristas.php" class="btn btn-primary w-100">Gerenciar Motoristas</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Rotas (RF3)</h5>
            <p class="card-text">Defina as rotas (origem e destino) que serão utilizadas nas viagens.</p>
          </div>
          <div class="card-footer bg-white border-0">
            <a href="rotas.php" class="btn btn-primary w-100">Gerenciar Rotas</a>
          </div>
        </div>
      </div>

      <div class="col">
        <div class="card h-100 shadow-sm">
          <div class="card-body">
            <h5 class="card-title">Viagens (RF4)</h5>
            <p class="card-text">Registre novas viagens, associando veículos, motoristas e rotas.</p>
          </div>
          <div class="card-footer bg-white border-0">
            <a href="viagens.php" class="btn btn-success w-100">Registrar Viagem</a>
          </div>
        </div>
      </div>

    </div>

<?php
  require("rodape.php");
?>